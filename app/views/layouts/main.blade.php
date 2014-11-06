<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Kamil Prosciewicz">
    <link rel="Shortcut icon" href="{{ URL::asset('img/favicon.gif') }}" />
    @yield('title')
    <title>KTG</title>

    {{ HTML::style('/css/bootstrap.min.css') }}
  </head>

  <body>
    <nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="index.php">KTG</a>
	  </div>

	  <div class="collapse navbar-collapse navbar-ex1-collapse">
	    <ul class="nav navbar-nav">
	      <li 
	        @if (Route::currentRouteName()=="root") class="active" @endif >
	          <a href="{{ URL::route('root'); }}"> Strona Główna </a>
	      </li>
	      <!-- <li><a href="#">To my!</a></li>
	      <li><a href="#">Wyjazdy</a></li>
	      <li><a href="#">Galerie</a></li> -->
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    <li>
	    	@if(!Sentry::check())
				<a href="{{URL::route('login.loginGET')}}">Niezalogowany login</a>
			@else
				<a href="{{URL::route('logout')}}">Zalogowany logout</a>
			@endif

	    </li>
	      
	    </ul>
	  </div>
	  </div>
	</nav>
    
    <div class="container">
    @if(Session::get('message'))
	    <div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>Sukces!</strong> &nbsp;{{Session::get('message')}}
		</div>
	@endif
			@yield('content')
      		
    <footer>
		<p>&copy; Kamil Prosciewicz.</p>
	</footer>
    </div><!-- /.container -->

    {{ HTML::script('js/jquery.min.js')}} 
    {{ HTML::script('js/bootstrap.min.js')}}

  </body>
</html>