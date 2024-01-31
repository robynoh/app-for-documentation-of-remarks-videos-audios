

<html>
  <head>
    <title>Information Management System | Login</title>
    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('bootstrap/css/bootstrap-responsive.min.css') }} " rel="stylesheet" media="screen">
    <link href="{{ asset('assets/styles.css') }}" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
   <!-- <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>-->
  </head>
  <body id="login">
  
    <div class="container">

      <form class="form-signin"  method="post" action="{{ route('login') }}">
           
           @csrf
	  
		<p style="font-size:14px;text-align:left;color:#ff0000;font-weight:bold">Sign in</p>
        <div class="mt-4">
              
                <x-jet-input style="height:35px" id="email" class="input-block-level" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="mt-4">
              
                <x-jet-input id="password" class="input-block-level" type="password" name="password" required autocomplete="current-password" />
            </div>
           
            <div class="flex items-center justify-end mt-4">
               
<br/>
                <x-jet-button class="btn btn-large btn-success">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
      </form>

    </div> <!-- /container -->
 
  </body>
</html>
