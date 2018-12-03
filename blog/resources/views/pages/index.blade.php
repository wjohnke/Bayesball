@extends('layouts.app')

@section('content')
	<!-- //header -->
	<!-- banner -->
	<div class="banner">
		<!-- container-wrap -->
		<div class="container-wrap-wrap">
			<div class="col-md-4 banner-img">
				<img src="images/1.png" alt="" />
			</div>
			<div class="col-md-8 banner-top-slide">
				<div class="banner-top-text">
					<h2>PLAY</h2>
					<h5>BayesBall</h5>
				</div>
				<div class="banner-bottom-bottom">
					<div class="banner-top-slide-grids">
						<script src="js/responsiveslides.min.js"></script>
						<script>
                            // You can also use "$(window).load(function() {"
                            $(function () {
                                // Slideshow 4
                                $("#slider3").responsiveSlides({
                                    auto: true,
                                    pager: true,
                                    nav: false,
                                    speed: 500,
                                    namespace: "callbacks",
                                    before: function () {
                                        $('.events').append("<li>before event fired.</li>");
                                    },
                                    after: function () {
                                        $('.events').append("<li>after event fired.</li>");
                                    }
                                });

                            });
						</script>
						<div  id="top" class="callbacks_container-wrap">
							<ul class="rslides" id="slider3">
								<li>
									<div class="banner-slid">
										<h3>What We Do</h3>
										<p>We use machine learning to predict the outcome of any given baseball game for the benefit of our users.
										</p>
									</div>
								</li>
								<li>
									<div class="banner-slid">
										<h3>Methods</h3>
										<p>We use machine learning techniques to make our projections. Our system makes predictions using the Naïve Bayes machine learning algorithm which makes use of Bayes’ Theorem, as well as predictions using linear regression.
										</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- //container-wrap -->
	</div>



	@include('includes.footer')

@endsection
