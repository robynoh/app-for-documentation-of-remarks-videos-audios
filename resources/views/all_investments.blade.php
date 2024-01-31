
<?php   use \App\Http\Controllers\resultController; ?>
@extends('layouts.guest')
@section('content')
<div role="main" class="main">
				
				<section class="custom-page-header-1 page-header page-header-modern page-header-lg bg-primary border-0 z-index-1 my-0">
					<div class="custom-page-header-1-wrapper overflow-hidden">
						<div class="custom-bg-grey-1 py-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="800">
							<div class="container py-3 my-3">
								<div class="row">
									<div class="col-md-12 align-self-center p-static text-center">
										<div class="overflow-hidden mb-2">
											<h1 class="font-weight-black text-12 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Social Investment</h1>
										</div>
									</div>
									<div class="col-md-12 align-self-center">
										<div class="overflow-hidden">
											<ul class="custom-breadcrumb-style-1 breadcrumb breadcrumb-light custom-font-secondary d-block text-center custom-ls-1 text-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1450">
												<li class="text-transform-none"><a href="demo-architecture-2.html" class="text-decoration-none">Home</a></li>
												<li class="text-transform-none active">Social Investment Programmes</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<div class="custom-page-wrapper pt-5">
					<div class="spacer py-4 my-5"></div>
					<div class="container container-xl-custom">
<div style="font-size:18px;color:black">
					

					</div>
					<br/>
						<div class="row">
							<div class="col-lg-8 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">

							@foreach($investments as $investment)
								<article class="mb-5">
									<div class="card border-0 border-radius-0">
										<div class="card-body p-0 z-index-1">
											

											
											<div class="card-body p-0">
												<h4 class="card-title mb-3 text-5 font-weight-semibold"><a class="text-color-dark text-color-hover-primary text-decoration-none font-weight-bold text-3-5" href="investment/{{str_replace(' ', '-',strtolower($investment->title))}}/{{$investment->id}}">{{$investment->title}}</a></h4>
												<p class="text-uppercase text-1 mb-3 pt-1 text-color-default" >
												<time pubdate datetime="2021-01-10">{{ \Carbon\Carbon::parse($investment->created_at)->diffForHumans() }}</time>
												<span class="opacity-3 d-inline-block px-2" >|</span> 
												<i class="fas fa-map-marker-alt"></i>  {{$investment->sector}}  

												<span class="opacity-3 d-inline-block px-2">|</span> 
												<i class="fas fa-map"></i> {{$investment->type_program}} 

											
											
											</p>
												
												<p class="card-text mb-2">{!! ucfirst(substr($investment->description,0,150)) !!}</p>
												<a href="investment/{{str_replace(' ', '-',strtolower($investment->title))}}/{{$investment->id}}" class="custom-read-more d-inline-flex align-items-center font-weight-semibold text-3 text-decoration-none ps-0">
													READ MORE +
												</a>
											</div>
										</div>
									</div>
								</article>
								@endforeach

								<hr class="mb-5">

							

								<?php //echo $investments->links(); ?>

							</div>
							<div class="blog-sidebar col-lg-4 pt-4 pt-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
								<aside class="sidebar">
								<div class="px-3 mb-4">
										<h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3">Search Archive</h3>
										<p class="m-0">Type in the program you want to search for</p>
									</div>
									<div class="py-1 clearfix">
										<hr class="my-2">
									</div>
									<div class="px-3 mt-4">
										<form action="/investment-search" method="get">
											<div class="input-group mb-3 pb-1">
												<input class="form-control box-shadow-none text-1 border-0 bg-color-grey" placeholder="Search..." name="search-term" id="s" type="text" required>
												<button type="submit" class="btn bg-color-grey text-1 p-2"><i class="fas fa-search m-2"></i></button>
											</div>
										</form>
									</div>
								
									<div class="py-1 clearfix">
										<hr class="my-2">
									</div>
								
									
									
								</aside>
							</div>
						</div>
					</div>

				</div>

			</div> 

			
            @endsection
