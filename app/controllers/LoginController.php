<?php 

class LoginController extends BaseController{
	public function __construct()
    {
        $this->beforeFilter('auth', array('on' => 'logout'));

        $this->beforeFilter('csrf', array('on' => 'loginPOST, registerPOST'));
    }

    public function auth($id, $code){
		$user = Sentry::findUserById($id);

	    // Attempt to activate the user
	    if ($user->attemptActivation($code))
	    {
	        return Redirect::route('news.index')->with('message', ['success','Użytkownik o mailu '.$user->email.' aktywowany']);
	    }
	    else
	    {
	        return Redirect::route('news.index')->with('message', ['danger','Użytkownika o mailu '.$user->email.' nie udało się aktywować']);
	    }
	}

	public function loginGET(){
		return View::make('login.login');
	}

	public function registerGET(){
		return View::make('login.register');
	}

	public function registerPOST(){
		try{
			$user = Sentry::register(array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password'),
		        'last_name' => Input::get('last_name'),
		        'first_name' => Input::get('first_name'),
		    ));

		    $activationCode = $user->getActivationCode();
		    $file = Input::file('picture');

		    if (Input::file('picture')->isValid())
			{
				$filename = md5(uniqid(rand(), true)).'.'.Input::file('picture')->getClientOriginalExtension();
			    Input::file('picture')->move('public/users/', $filename);
			    $user->picture = 'users/'.$filename;
			    $user->save();
			}

	    	$data = array(
		    	'email'    => Input::get('email'),
		        'password' => Input::get('password'),
		        'last_name' => Input::get('last_name'),
		        'first_name' => Input::get('first_name'),
		        'activation_code' => $activationCode, 
		        'id'=> $user->getId()
	        );
		    Mail::send('emails.registration', $data , function($message)
			{
			    $message->to('kprosciewicz@gmail.com', 'Kamil Prościewicz')->subject('Rejestracja');
			});

		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    return Redirect::to(URL::previous())
			    ->withInput()
	       		->withErrors(array('email' => 'E-mail jest wymagany.'));
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    return Redirect::to(URL::previous())
			    ->withInput()
	       		->withErrors(array('password' => 'Hasło jest wymagane'));
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    return Redirect::to(URL::previous())
			    ->withInput()
	       		->withErrors(array('email' => 'Taki użytkownik już istnieje'));
		}
		return Redirect::route('login.loginGET');
	}

	public function loginPOST(){
		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password'),
		    );

		    // Authenticate the user
		    $user = Sentry::authenticate($credentials, Input::get('remember'));
		    return Redirect::route('root');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    return Redirect::to(URL::previous())
			    ->withInput()
	       		->withErrors(array('email' => 'E-mail jest wymagany.'));

		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    return Redirect::to(URL::previous())
			    ->withInput()
	       		->withErrors(array('password' => 'Hasło jest wymagane'));
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    return Redirect::to(URL::previous())
			    ->withInput()
	       		->withErrors(array('password' => 'Nieprawidłowe hasło'));
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    return Redirect::to(URL::previous())
			    ->withInput()
	       		->withErrors(array('email' => 'Nie ma takiego użytkownika'));
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    return Redirect::to(URL::previous())
			    ->withInput()
	       		->withErrors(array('email' => 'Użytkownik nie jest jeszcze aktywowany'));
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    echo 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    echo 'User is banned.';
		}
	}

	public function logout()
	{
		Sentry::logout();
		return Redirect::to(URL::previous());
	}
}