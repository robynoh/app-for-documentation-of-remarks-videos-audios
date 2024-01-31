
<?php   use \App\Http\Controllers\resultController; ?>
<?php $eventid=resultController::pullaudio($speeches->eventID); ?>
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
											<h1 class="font-weight-black text-12 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200" style="font-size:14px">{{$speeches->title}}</h1>
										</div>
									</div>
									<div class="col-md-12 align-self-center">
										<div class="overflow-hidden">
											<ul class="custom-breadcrumb-style-1 breadcrumb breadcrumb-light custom-font-secondary d-block text-center custom-ls-1 text-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1450">
												<li class="text-transform-none"><a href="demo-architecture-2.html" class="text-decoration-none">Home</a></li>
												<li class="text-transform-none active">Remarks</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>


				<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="left:0px; top:150px;">
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_pinterest"></a>
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
</div>


				<div class="custom-page-wrapper pt-5">
					<div class="spacer py-4 my-5"></div>
					<div class="container container-xl-custom">
<div style="font-size:18px;color:black">
				

					</div>
					<br/>
						<div class="row">
							<div class="col-lg-8 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">

							
								<article class="mb-5">
									<div class="card border-0 border-radius-0">
										<div class="card-body p-0 z-index-1">
											<a href="#">
												<img class="card-img-top border-radius-0 hover-effect-2" src="{{$speeches->caption_photo}}" alt="Card Image">
											</a>
											<p class="text-uppercase text-1 mb-3 pt-1 text-color-default">
												<time pubdate datetime="2021-01-10">{{ \Carbon\Carbon::parse($speeches->event_time)->diffForHumans() }}</time>
												<span class="opacity-3 d-inline-block px-2">|</span> 
												<i class="fas fa-map-marker-alt"></i>  {{$speeches->venue}}  

												<span class="opacity-3 d-inline-block px-2">|</span> 
												<i class="fas fa-download"></i> download as Document 

											
											
											</p>
											<div class="card-body p-0">
											<h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3">Transcript</h3>
												<p class="card-text mb-2">{!! $speeches->content !!}</p>
												


											</div>
										</div>
									</div>
								</article>
							

								<hr class="mb-5">

							

							

							</div>
							<div class="blog-sidebar col-lg-4 pt-4 pt-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
								<aside class="sidebar">
									<div class="px-3 mb-4">
										<h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3">Listen to audio</h3>
										<figure>
   <?php if($eventid=='empty'){?>

<span> Sorry no Audio is Uploaded for this remark</span>

   <?php }else{?>
    <audio
        controls
        src="<?php echo $eventid; ?>" >
            Your browser does not support the
            <code style="background:forestgreen">audio</code> element.
    </audio>
	<?php }?>
</figure></div> 



									<div class="py-1 clearfix">
										<hr class="my-2">
									</div>


									<div class="px-3 mt-4">
										<h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3">Recent Posts</h3>
										<div class="pb-2 mb-1">
											<?php echo resultController::latestpost(); ?>
											<a href="/all-events" class="text-color-default text-uppercase text-1 mb-0 d-block text-decoration-none">VIEW MORE</a>		
										</div>
									</div>
									<div class="px-3 mt-4">
									<h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0 mb-3">Search Archive</h3>
									
										<form action="/page-search" method="get">
											<div class="input-group mb-3 pb-1">
												<input class="form-control box-shadow-none text-1 border-0 bg-color-grey" placeholder="Search..." name="search-term" id="s" type="text">
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
