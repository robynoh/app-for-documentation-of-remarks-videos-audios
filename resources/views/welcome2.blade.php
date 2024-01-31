
<?php   use \App\Http\Controllers\resultController; ?>
@extends('layouts.guest')
@section('content')
<div role="main" class="main">
				
				<section class="section bg-primary border-0 position-relative z-index-1 py-0 m-0">
							<div class="custom-slider-background overflow-hidden">
								<div class="custom-slider-background-image-stage-outer appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1600">
									<div class="custom-slider-background-image-stage">
										<div class="custom-slider-background-image-item overlay overlay-show overlay-op-6" style="background-image: url(img/demos/architecture-2/slides/slide-1-1.jpg); background-size: cover; background-position: center;"></div>
										<div class="custom-slider-background-image-item overlay overlay-show overlay-op-6" style="background-image: url(img/demos/architecture-2/slides/slide-1-2.jpg); background-size: cover; background-position: center;"></div>
										<div class="custom-slider-background-image-item overlay overlay-show overlay-op-6" style="background-image: url(img/demos/architecture-2/generic/generic-1.jpg); background-size: cover; background-position: center;"></div>
										<div class="custom-slider-background-image-item overlay overlay-show overlay-op-6" style="background-image: url(img/demos/architecture-2/generic/generic-2.jpg); background-size: cover; background-position: center;"></div>
									</div>
								</div>
								<div class="custom-slider-background-image-stage-outer appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1600">
									<div class="custom-slider-background-image-stage reverse">
										<div class="custom-slider-background-image-item overlay overlay-show overlay-op-6" style="background-image: url(img/demos/architecture-2/generic/generic-2.jpg); background-size: cover; background-position: center;"></div>
										<div class="custom-slider-background-image-item overlay overlay-show overlay-op-6" style="background-image: url(img/demos/architecture-2/generic/generic-1.jpg); background-size: cover; background-position: center;"></div>
										<div class="custom-slider-background-image-item overlay overlay-show overlay-op-6" style="background-image: url(img/demos/architecture-2/slides/slide-1-1.jpg); background-size: cover; background-position: center;"></div>
										<div class="custom-slider-background-image-item overlay overlay-show overlay-op-6" style="background-image: url(img/demos/architecture-2/slides/slide-1-2.jpg); background-size: cover; background-position: center;"></div>
									</div>
								</div>
							</div>
							<div class="owl-carousel-wrapper appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1600" style="height: 800px;">
								<div id="slider" class="owl-carousel dots-inside dots-horizontal-center show-dots-xs custom-dots-position nav-style-1 nav-inside nav-inside-plus nav-light nav-lg nav-font-size-lg mb-0" data-plugin-options="{'responsive': {'0': {'items': 1, 'dots': true, 'nav': false}, '479': {'items': 1}, '768': {'items': 1}, '979': {'items': 1}, '1199': {'items': 1, 'nav': true, 'navVerticalOffset': '-100px', 'dots': false}}, 'loop': false, 'autoHeight': false, 'margin': 0, 'dots': true, 'dotsVerticalOffset': '-115px', 'nav': false, 'animateIn': 'fadeIn', 'animateOut': 'fadeOut', 'mouseDrag': false, 'touchDrag': false, 'pullDrag': false, 'autoplay': false, 'autoplayTimeout': 9000, 'autoplayHoverPause': true, 'rewind': true}">
										
									<!-- Carousel Slide 1 -->
									<div class="position-relative overflow-hidden" data-dynamic-height="['800px','800px','800px','550px','500px']" style="height: 800px;">
										<div class="container container-lg-custom custom-container-style-2 position-relative z-index-3 h-100 pt-5 mt-5 mt-sm-3">
											<div class="row align-items-center h-100">
												<div class="col">
													<div class="overflow-hidden mb-2 mb-sm-1 mb-md-0">
														<h1 class="text-color-light font-weight-black line-height-1 text-10 text-md-13 text-lg-15 ls-0 mb-0 appear-animation" data-appear-animation="maskUp">Prosperity</h1>
													</div>
													<div class="overflow-hidden opacity-8 mb-1">
														<h2 class="text-color-light line-height-6 line-height-md-2 text-5 text-md-6 positive-ls-3 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250">Collectively raising the bar and </h2>
													</div>
													<div class="overflow-hidden opacity-6 mb-5">
														<p class="text-color-light text-3-5 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">Changing the orientation about Bayelsa state.</p>
													</div>
													<a href="/social-investment" data-hash data-hash-offset="140" class="btn btn-primary custom-btn-style-1 font-weight-bold text-3 px-5 py-3 appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="750">VIEW SOCIAL INVESTMENT</a>
												</div>
											</div>
										</div>
									</div>
									
									<!-- Carousel Slide 2 -->
									<div class="position-relative overflow-hidden" data-dynamic-height="['800px','800px','800px','550px','500px']" style="height: 800px;">
										<div class="container container-lg-custom custom-container-style-2 position-relative z-index-3 h-100 pt-5 mt-5 mt-sm-3">
											<div class="row align-items-center justify-content-end h-100">
												<div class="col text-right">
													<div class="overflow-hidden mb-2 mb-sm-1 mb-md-0">
														<h1 class="text-color-light font-weight-black line-height-1 text-10 text-md-13 text-lg-15 ls-0 mb-0 appear-animation d-none" data-appear-animation="maskUp">The Agenda</h1>
													</div>
													<div class="overflow-hidden opacity-8 mb-1">
														<h2 class="text-color-light line-height-6 line-height-md-2 text-5 text-md-6 positive-ls-3 mb-0 appear-animation d-none" data-appear-animation="maskUp" data-appear-animation-delay="250">Putting physical structures in place  </h2>
													</div>
													<div class="overflow-hidden opacity-6 mb-5">
														<p class="text-color-light text-3-5 mb-0 appear-animation d-none" data-appear-animation="maskUp" data-appear-animation-delay="500"> without neglecting to  build the human capital and lives</p>
													</div>
													<a href="physical-dev" data-hash data-hash-offset="140" class="btn btn-primary custom-btn-style-1 custom-btn-style-1-right font-weight-bold text-3 px-5 py-3 appear-animation d-none" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="750">ALL PHYSICAL DEVELOPMENTS</a>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
				</section>

				<div class="position-relative">
					<img src="{{ asset('img/demos/architecture-2/backgrounds/arch-plan-1.jpg')}}" class="img-fluid position-absolute top-0 right-0" alt="" />
				</div>

				<div class="custom-page-wrapper">
					<section class="section bg-transparent border-0 position-relative py-0 m-0">
						<div class="container container-lg-custom custom-container-style custom-margin-top">
							<div class="row mb-5">
								<div class="col">
									<div class="overflow-hidden">
										<div class="owl-carousel-wrapper position-relative z-index-1 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1000" style="height: 373px;">
											<div class="owl-carousel owl-theme dots-horizontal-center custom-dots-style-1 mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 3}}, 'margin': 25, 'loop': true, 'nav': false, 'dots': true, 'autoplay': true, 'autoplayTimeout': 7000}">
												<div>
													<a href="all-events" class="text-decoration-none">
														<div class="card custom-card-style-1 border-radius-0">
															<div class="card-body text-center p-5 mb-4">
																<img width="75" src="img/demos/architecture-2/icons/note-svgrepo-com.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary mt-3 mb-4 pb-3'}" />
																<h2 class="text-color-dark font-weight-bold line-height-1 text-6-5 mb-3">Remarks</h2>
																<p class="mb-0">Access remarks of Senator Douye Diri in various events in the prosperity administration.  </p>
															</div>
														</div>
													</a>
												</div>
												<div>
													<a href="/physical-dev" class="text-decoration-none">
														<div class="card custom-card-style-1 border-radius-0">
															<div class="card-body text-center p-5 mb-4">
																<img width="75" src="{{ asset('img/demos/architecture-2/icons/investment-svgrepo-com.svg')}}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary mt-3 mb-4 pb-3'}" />
																<h2 class="text-color-dark font-weight-bold line-height-1 text-6-5 mb-3">Capital Investments</h2>
																<p class="mb-0">Archive of all physical development completed by Senator Douye Diri.</p>
															</div>
														</div>
													</a>
												</div>
												<div>
													<a href="/social-investment" class="text-decoration-none">
														<div class="card custom-card-style-1 border-radius-0">
															<div class="card-body text-center p-5 mb-4">
																<img width="75" src="{{ asset('img/demos/architecture-2/icons/investment-brain-svgrepo-com.svg')}}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary mt-3 mb-4 pb-3'}" />
																<h2 class="text-color-dark font-weight-bold line-height-1 text-6-5 mb-3">Social Investments</h2>
																<p class="mb-0">Initiatives of the prosperity administration to improving the well-being of Bayelsans.</p>
															</div>
														</div>
													</a>
												</div>
												<div>
													<a href="/social-investment" class="text-decoration-none">
														<div class="card custom-card-style-1 border-radius-0">
															<div class="card-body text-center p-5 mb-4">
																<img width="75" src="{{ asset('img/demos/architecture-2/icons/insurance-svgrepo-com.svg')}}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary mt-3 mb-4 pb-3'}" />
																<h2 class="text-color-dark font-weight-bold line-height-1 text-6-5 mb-3">Policies</h2>
																<p class="mb-0">View all bills initiated by the Prosperity Administration and ascented into law.</p>
															</div>
														</div>
													</a>
												</div>

                                                <div>
													<a href="/social-investment" class="text-decoration-none">
														<div class="card custom-card-style-1 border-radius-0">
															<div class="card-body text-center p-5 mb-4">
																<img width="75" src="{{ asset('img/demos/architecture-2/icons/dove-of-peace-svgrepo-com.svg')}}" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary mt-3 mb-4 pb-3'}" />
																<h2 class="text-color-dark font-weight-bold line-height-1 text-6-5 mb-3">Peace & Conflict</h2>
																<p class="mb-0">Conflict resolution efforts of Senator Douye Diri in the prosperity administration</p>
															</div>
														</div>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="start" class="row align-items-center pb-xl-5 mb-xl-5">
								<div class="col-9 col-lg-4 col-xl-5 pb-5 pb-lg-0 mb-5 mb-lg-0">
									<div class="position-relative">
										<img src="{{ asset('img/demos/architecture-2/backgrounds/arch-plan-2.jpg')}}" class="img-fluid position-absolute left-0 z-index-0 appear-animation" alt="" data-appear-animation="fadeIn" data-appear-animation-delay="850" style="bottom: -168px;" />
										<div class="overflow-hidden position-relative z-index-1">
											<img src="{{ asset('img/demos/architecture-2/generic/generic-1.jpg')}}" class="img-fluid appear-animation" alt="" data-appear-animation="maskLeft" data-appear-animation-delay="250" />
										</div>
										<div class="overflow-hidden position-absolute z-index-2" style="bottom: -75px; right: -17%;">
											<img src="{{ asset('img/demos/architecture-2/generic/generic-2.jpg')}}" class="img-fluid appear-animation" alt="" data-appear-animation="maskRight" data-appear-animation-delay="550" />
										</div>
									</div>
								</div>
								<div class="col-lg-7 col-xl-5 offset-lg-1 pt-5 pt-lg-0">
									<div class="position-absolute z-index-0 left-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="2000" style="top: 190px;">
										<h2 class="text-color-dark custom-stroke-text-effect-1 custom-big-font-size-1 font-weight-black opacity-1 mb-0">DIRI DOUYE</h2>
									</div>
									<div class="pt-lg-5 pl-lg-5 mt-lg-5">
										<div class="overflow-hidden mb-2">
											<h2 class="text-color-default positive-ls-3 line-height-3 text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="800">THE AUTOBIOGRAPHY</h2>
										</div>
										<div class="overflow-hidden mb-3">
											<h3 class="text-transform-none text-color-dark font-weight-black text-10 line-height-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1000">In The Beginning.</h3>
										</div>
										<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">
											<img src="{{ asset('img/demos/architecture-2/divider.jpg')}}" class="img-fluid opacity-5 mb-4" alt="" />
										</div>
										<p class="custom-font-tertiary text-5 line-height-4 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">Despite the current challenges we are being faced with as a people, lets remain resolute and work together for a greater unity, a better economy and a brighter future for all.</p>
										<p class="text-3-5 pb-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">Douye Diri was born on June 4th, 1959 into the family of A.J.M Diri of Kalama-Owinari compound of Kolokuma/Opokuma Local Government Area of Bayelsa State, Nigeria...</p>
										<a href="/biography" class="btn btn-primary custom-btn-style-1 font-weight-bold text-3 px-5 py-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">READ MORE</a>
									</div>
								</div>
							</div>
						</div>
						
						



                       
						
					</section>
				
                    <hr class="my-0">
                    
					<div class="container container-lg-custom">
						<div class="row py-5 my-5">
							<div class="col-lg-5 col-xl-4 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="250" data-plugin-options="{'accY': -400}">
								<div class="position-absolute z-index-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="500" style="top: 102px; left: -246px;">
									<h2 class="text-color-dark custom-stroke-text-effect-1 custom-big-font-size-3 font-weight-black opacity-1 mb-0">QUESTION</h2>
								</div>
								<h2 class="text-color-default positive-ls-3 line-height-3 text-4 mb-2">COMMON QUESTIONS</h2>
								<h3 class="text-transform-none text-color-dark font-weight-black text-10 line-height-2 mb-4">Frequent Questions</h3>
								<img src="img/demos/architecture-2/divider.jpg" class="img-fluid opacity-5 mb-4 mt-2" alt="" />
								<p class="custom-font-tertiary text-5 line-height-4 mb-4 mt-2">Our priority is to improve the quality of lives of every Bayelsan and build a state that we all will be proud of; irrespective of our political affiliations, religion or local government.- <b style="font-size:12px">Senator Douye Diri</b></p>
								<p class="text-3-5 pb-2 mb-4"> </p>
								<a href="/all-events" class="btn btn-primary custom-btn-style-1 font-weight-bold text-3 px-5 py-3">VIEW REMARKS</a>
							</div>
							<div class="col-lg-7 col-xl-8 appear-animation" data-appear-animation="fadeInRightShorterPlus" data-appear-animation-delay="500" data-plugin-options="{'accY': -400}">
								<div class="custom-accordion-style-1 accordion accordion-modern" id="FAQAccordion">
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-dark font-weight-bold" data-toggle="collapse" href="#collapseFAQOne">
													What are the Capital Investments that the Prosperty Administration have achieved ?
												</a>
											</h4>
										</div>
										<div id="collapseFAQOne" class="collapse show" data-parent="#FAQAccordion">
											<div class="card-body pl-4 w-md-75pct">
												<p class="mb-0">   The prosperity administration led by His Excellency, Senator douye diri has done several physical developmental projects that will enable the flow of economic activities in other to achieve economic growth and development. <a href="/physical-dev">Read More >></a></p>
											</div>
										</div>
									</div>
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-dark font-weight-bold" data-toggle="collapse" href="#collapseFAQTwo">
                                                Has the Prosperty Administration done any social investment programme ?
												</a>
											</h4>
										</div>
										<div id="collapseFAQTwo" class="collapse" data-parent="#FAQAccordion">
											<div class="card-body pl-4">
												<p class="mb-0">As a man who is passionate about the wellbeing of bayelsans and about how much of bayelsans are participating in production of values to meet both local and international need, from the day of his swearing-in, he has tireless work to ensure all youths and able bodied in the state acquire skills and recieve financial support in their business. <a href="social-investment">Read More</a></p>
											</div>
										</div>
									</div>
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-dark font-weight-bold" data-toggle="collapse" href="#collapseFAQFour">
													How many bills initiated by the Prosperity Administration have been ascented into law ?
												</a>
											</h4>
										</div>
										<div id="collapseFAQFour" class="collapse" data-parent="#FAQAccordion">
											<div class="card-body pl-4">
												<p class="mb-0">Senator Douye Diri on assumption in office has made initiated several bills that will provide an enabling enviroment for business, in the area of technology and more. <a href="social-investment">Read More</a></p>
											</div>
										</div>
									</div>
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-dark font-weight-bold" data-toggle="collapse" href="#collapseFAQFive">
													How do i have access to speeches of Douye Diri during events in the Prosperity Administration?
												</a>
											</h4>
										</div>
										<div id="collapseFAQFive" class="collapse" data-parent="#FAQAccordion">
											<div class="card-body pl-4">
												<p class="mb-0">Accessing information regarding speeches, audios and videos of events attended by Senator Douye Diri is very easy. To access these information just click the events tab above or <a href="all-events">Click Here</a></p>
											</div>
										</div>
									</div>
									<div class="card card-default">
										<div class="card-header">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-dark font-weight-bold" data-toggle="collapse" href="#collapseFAQTSix">
													Has the prosperity administration made any conflict resolution effort?
												</a>
											</h4>
										</div>
										<div id="collapseFAQTSix" class="collapse" data-parent="#FAQAccordion">
											<div class="card-body pl-4">
												<p class="mb-0">Douye Diri has done several intervention to restore peace in various communities in the state. <a href="social-investment">Read More</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<hr class="my-0">

						<div class="row py-5 my-5">
							<div class="col-lg-6 col-xl-7 mx-auto mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="500">
								<div class="owl-carousel owl-theme nav-style-1 nav-outside nav-font-size-lg custom-nav-grey mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 2}, '992': {'items': 1}, '1200': {'items': 2}}, 'loop': true, 'nav': true, 'dots': false, 'margin': 20}">
									
								
								<?php echo resultController::TwoInfrastructure(); ?>
								
								
								</div>
							</div>
							<div class="col-lg-5 col-xl-4 text-right appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="250">
								<div class="position-absolute z-index-0 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="500" style="top: 102px; right: -50px;">
									<h2 class="text-color-dark custom-stroke-text-effect-1 custom-big-font-size-3 font-weight-black opacity-1 mb-0">PROJECTS</h2>
								</div>
								<h2 class="text-color-default positive-ls-3 line-height-3 text-4 mb-2">CAPITAL INVESTMENT</h2>
								<h3 class="text-transform-none text-color-dark font-weight-black text-10 line-height-2 mb-4">Physical Development</h3>
								<img src="img/demos/architecture-2/divider.jpg" class="img-fluid opacity-5 mb-4 mt-2" alt="" />
								<p class="custom-font-tertiary text-5 line-height-4 mb-4 mt-2">Transforming public infrastructure for the socio-economic growth of Bayelsa State is top of my list of priorities. - <b style="font-size:12px">Senator Douye Diri</b>
</p>
								
								<a href="physical-dev" class="btn btn-primary custom-btn-style-1 custom-btn-style-1-right font-weight-bold text-3 px-5 py-3">VIEW ALL PROJECTS</a>
							</div>
						</div>
					</div>

					

					<section class="section bg-transparent border-0 position-relative m-0">
						<div class="container container-lg-custom py-5">
							<div class="row">
								<div class="col text-center">
									<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
										<div class="position-absolute transform3dx-n50 left-50pct z-index-0" style="top: 56px;">
											<h2 class="text-color-dark custom-stroke-text-effect-1 custom-big-font-size-1 font-weight-black opacity-1 mb-0">EVENTS REMARKS</h2>
										</div>
									</div>
									<h2 class="text-color-default positive-ls-3 line-height-3 text-4 mb-2">EVENTS</h2>
									<h3 class="text-transform-none text-color-dark font-weight-black text-10 line-height-2 mb-3">Remarks</h3>
									<img src="img/demos/architecture-2/divider.jpg" class="img-fluid opacity-5 mt-3 mb-5" alt="" />
								</div>
							</div>
							<div class="row row-gutter-sm">
<?php echo resultController::fourEvents(); ?>


							
							
                                
							</div>

                            
						</div>

                        <a href="all-events" class="btn btn-primary custom-btn-style-1 custom-btn-style-1-right font-weight-bold text-3 px-5 py-3">VIEW ALL EVENTS</a>
						
					</section>
				</div>

			

			</div> 
            @endsection
