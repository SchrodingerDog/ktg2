<?php 

class LoginController extends BaseController{
	public function __construct()
    {
        $this->beforeFilter('auth', array('on' => 'logout'));

        $this->beforeFilter('csrf', array('on' => 'loginPOST, registerPOST'));
    }

	public function loginGET(){
		return View::make('login.login');
	}

	public function registerGET(){
		return View::make('login.register');
	}

	public function registerPOST(){
		$user = Sentry::register(array(
	        'email'    => Input::get('email'),
	        'password' => Input::get('password'),
	        'last_name' => Input::get('last_name'),
	        'first_name' => Input::get('first_name'),
	    ), true);
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