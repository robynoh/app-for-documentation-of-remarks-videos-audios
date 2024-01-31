
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
											<h1 class="font-weight-black text-12 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Questions</h1>
										</div>
									</div>
									<div class="col-md-12 align-self-center">

									
										<div class="overflow-hidden">
											<ul class="custom-breadcrumb-style-1 breadcrumb breadcrumb-light custom-font-secondary d-block text-center custom-ls-1 text-5 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1450">
												<li class="text-transform-none"><a href="demo-architecture-2.html" class="text-decoration-none">Home</a></li>
												<li class="text-transform-none active">Frequently Asked Question</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<div class="custom-page-wrapper">
					
				
				<br/><br/><br/><br/>
                    
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
												<p class="mb-0">   The prosperity administration led by His Excellency, Senator Douye Diri has done several physical developmental projects that will enable the flow of economic activities in other to achieve economic growth and development. <a href="/physical-dev">Read More >></a></p>
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

					</div>

					

				</div>

			</div> 

			
            @endsection
