<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			xDocker Test drive Docker Image on any Cloud IaaS
			@show
		</title>
		<meta name="keywords" content="Docker, Amazon AWS Google Compute" />
		<meta name="author" content="Team xDocker" />
		<meta name="description" content="There are docker images for builds that are available in docker repository. We will only focus on public repositories. We list the repositories and any chosen repository could be deployed on any cloud. Now this could be run on your local machine too.
But when you are vetting a service, as to how it looks and works, you may need to manually set up the service through multiple steps.
" />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        <link rel="stylesheet" href="{{asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/bower_components/flat-ui/dist/css/flat-ui.css')}}">
        <link rel="stylesheet" href="{{asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/custom.css')}}">
		<style>
        body {
            padding: 60px 0;
        }
		@section('styles')
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.ico') }}}">
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">
		<!-- Navbar -->
        	
		<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
			 <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-target">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{{ URL::to('') }}}"><img src="{{{ asset('assets/img/logo.png') }}}"></a>  
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-target">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                        @if (Auth::user()->hasRole('admin'))
                        <li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                        @endif
                        <li><a href="{{{ URL::to('account') }}}">Accounts</a></li>
                        <li><a href="{{{ URL::to('user') }}}">Logged in as {{{ Auth::user()->username }}}</a></li>
                        <li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
                        @else
                        <li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
                        <li {{ (Request::is('user/create') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
                        @endif
                    </ul>
					<!-- ./ nav-collapse -->
				</div>
			</div>
		</nav>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">
			<a {{ (Request::is('/') ? ' class="show"' : 'class="hide"') }} href="https://github.com/XDocker/app" target="_blank">
		        <img style="position: absolute; top: 53px; right: 0; border: 0;" src="{{{ asset('assets/img/forkme_right_red_aa0000.png') }}}" alt="Fork me on GitHub">
		      </a>
			<!-- Notifications -->
			@include('notifications')
			<!-- ./ notifications -->

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
		</div>
		<!-- ./ container -->

		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>
		</div>
		<!-- ./wrap -->

		<hr>
	    <div id="footer">
	      <div class="container">
	        <p class="muted credit text-center">xDocker : Test drive Docker images on any infrastructure. </p>
	        <p class="text-center">
	        	<iframe src="http://ghbtns.com/github-btn.html?user=xdocker&repo=app&type=watch&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="170" height="30"></iframe>
	        </p>
	      </div>
	    </div>

		<!-- Javascripts
		================================================== -->
        <script src="{{asset('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/bower_components/flat-ui/dist/js/flat-ui.min.js')}}"></script>

        @yield('scripts')
	</body>
</html>
