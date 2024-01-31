<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>{{ config('app.name', 'Laravel') }}</title>
		

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">



		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7COverpass:200,400,600,700,800,900%7CPT+Serif&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('portocss/vendor/bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{ asset('portocss/vendor/fontawesome-free/css/all.min.css')}}">
		<link rel="stylesheet" href="{{ asset('portocss/vendor/animate/animate.compat.css')}}">
		<link rel="stylesheet" href="{{ asset('portocss/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
		<link rel="stylesheet" href="{{ asset('portocss/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{ asset('portocss/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{ asset('portocss/vendor/magnific-popup/magnific-popup.min.css')}}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('css/theme.css')}}">
		<link rel="stylesheet" href="{{ asset('css/theme-elements.css')}}">
		<link rel="stylesheet" href="{{ asset('css/theme-blog.css')}}">
		<link rel="stylesheet" href="{{ asset('css/theme-shop.css')}}">



		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{asset('css/demos/demo-architecture-2.css')}}">
		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{asset('css/skins/skin-architecture-2.css')}}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('css/custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('portocss/vendor/modernizr/modernizr.min.js')}}"></script>

	</head>

	<body class="loading-overlay-showing" data-loading-overlay data-plugin-page-transition>
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

		<div class="body">
			<header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyHeaderContainerHeight': 80, 'stickyStartAt': 50, 'stickyChangeLogo': false}">
				<div class="header-body border-top-0 bg-primary appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="2000" data-plugin-options="{'forceAnimation': true}">
					<div class="header-container container-fluid">
						<div class="header-row">
							<div class="header-column align-items-start justify-content-center">
								<div class="header-logo z-index-2 col-lg-2 px-0">
									<a href="demo-architecture-2.html">
										<img alt="Porto" width="350" height="80" src="{{asset('img/demos/architecture-2/logo.png')}}">
									</a>
								</div>
							</div>
							<div class="header-column flex-row justify-content-end justify-content-lg-center">
								<div class="header-nav header-nav-line header-nav-bottom-line header-nav-bottom-line-effect-1 header-nav-dropdowns-dark header-nav-light-text justify-content-end">
									<div class="header-nav-main header-nav-main-arrows header-nav-main-mobile-dark header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1">
										<nav class="collapse">
											<ul class="nav nav-pills" id="mainNav">
											<li><a href="/" <?php if(Request::segment(2)==''){?>class="nav-link active"<?php }?>>Home</a></li>
												<li><a href="/all-events" <?php if(Request::segment(2)=='/all-events'){?>class="nav-link active"<?php }?>>Events</a></li>
                                                
													<li class="dropdown">
													<a href="#" class="nav-link dropdown-toggle">Milestone</a>
													<ul class="dropdown-menu">
														<li><a href="/physical-dev" class="dropdown-item">Physical Development</a></li>
														<li><a href="/social-investment" class="dropdown-item">Social Investment</a></li>
														<li><a href="/social-investment/policies" class="dropdown-item">Policies</a></li>
														<li><a href="/social-investment/conflict resolution" class="dropdown-item">Peace & Conflict Resolution</a></li>
													</ul>
												</li>
												<li><a href="/biography" class="nav-link">Biography</a></li>

                                                <li><a href="/faq" class="nav-link">FAQs</a></li>
												
											</ul>
										</nav>
									</div>
								</div>
								
								<button class="btn header-btn-collapse-nav bg-transparent border-0 text-4 position-relative top-2 p-0 ml-4" data-toggle="collapse" data-target=".header-nav-main nav">
									<i class="fas fa-bars"></i>
								</button>
							</div>
							
						</div>
					</div>
				</div>
				<div class="header-nav-features header-nav-features-no-border p-static">
					<div class="header-nav-feature header-nav-features-search header-nav-features-search-reveal header-nav-features-search-reveal-big-search header-nav-features-search-reveal-big-search-full">
						<div class="container">
							<div class="row h-100 d-flex">
								<div class="col h-100 d-flex">
									<form role="search" class="d-flex h-100 w-100" action="page-search-results.html" method="get">
										<div class="big-search-header input-group">
											<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Type and hit enter...">
											<a href="#" class="header-nav-features-search-hide-icon"><i class="fas fa-times header-nav-top-icon"></i></a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

            

			@yield('content')

			<footer id="footer" class="bg-primary border-0">
				
				<div class="footer-copyright bg-primary">
					<div class="container container-lg-custom pb-4">
						<div class="row">
							<div class="col">
								<hr class="my-0 bg-color-light opacity-1">
							</div>
						</div>
						<div class="row py-5 my-3">
							<div class="col text-center">
								
								<p class="text-3 mb-0" style="color:#fff">Department of Strategic Communication and Documentation, Bayelsa State © 2021. All Rights Reserved</p>
							</div>
						</div>
					</div>
				</div>
			</footer>

		</div>


		<!-- Vendor -->
		<!-- Vendor -->
		<script src="{{ asset('portocss/vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/popper/umd/popper.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/lazysizes/lazysizes.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/isotope/jquery.isotope.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/vide/jquery.vide.min.js') }}"></script>
		<script src="{{ asset('portocss/vendor/vivus/vivus.min.js') }}"></script>
		

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('js/theme.js')}}"></script>

		

		<!-- Demo -->
		<script src="{{ asset('js/demos/demo-architecture-2.js') }}"></script>	
		<!-- Theme Custom -->
		<script src="{{ asset('js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('js/theme.init.js') }}"></script>
		<script async src="https://static.addtoany.com/menu/page.js"></script>






	</body>
</html>