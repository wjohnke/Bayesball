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
						<h5>Bayes Ball</h5>
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
		<!-- //banner -->
        
		<!-- about -->
		<!--<div class="about">
			<div class="container-wrap">
				<div class="about-grids">
					<div class="col-md-6 about-left">
						<h2>Find out more about Bayes Ball</h2>
						<h4>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</h4>
						<p>Donec ac ultrices turpis. Nunc ac ante dolor. Maecenas eget lectus vitae risus finibus aliquet. Maecenas in erat id elit convallis tristique. Mauris blandit sed metus vitae dignissim. Aliquam euismod ex vel faucibus viverra. Fusce quis efficitur libero, a facilisis magna.</p>
					</div>
					<div class="col-md-6 about-right">
						<img src="images/2.png" alt="" />
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="rules">
			
			<div class="container-wrap">
				<div class="rules-info">
					<h3>Rules & Standards</h3>
				</div>
				<div class="rules-top-grids">
					<div class="rules-grids">
						<div class="col-md-6 rules-grid">
							<div class="rules-left">
								<h4>Resource center</h4>
							</div>
						</div>
						<div class="col-md-6 rules-grid">
							<div class="rules-right">
								<h5>Praesent congue elit pulvinar molestie sodales. Nulla blandit tellus in interdum gravida.</h5>
								<p>Etiam eget arcu tincidunt tortor tristique consectetur eu purus elementum tristique consectetur eu purus elementum, egestas nisi non, sollicitudin eros ac quis arcu. Donec eu urna venenatis, sagittis erat at, condimentum mi. </p>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="rules-grids">
						<div class="col-md-6 rules-grid">
							<div class="rules-right">
								<h5>Praesent congue elit pulvinar molestie sodales. Nulla blandit tellus in interdum gravida.</h5>
								<p>Etiam eget arcu tincidunt tortor tristique consectetur eu purus elementum tristique consectetur eu purus elementum, egestas nisi non, sollicitudin eros ac quis arcu. Donec eu urna venenatis, sagittis erat at, condimentum mi. </p>
							</div>
						</div>
						<div class="col-md-6 rules-grid">
							<div class="rules-left rules-left-bg">
								<h4>National teams</h4>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			
		</div>
		<div id="news" class="news">
			<div class="news-left">
				<div class="news-left-info">
					<div class="news-left-text">
						<h3>News</h3>
					</div>
					<div class="rules-grids">
						<div class="col-md-6 news-grid">
							<a href="about.blade.php">Integer vitae ligula sed lectus</a>
							<h6>10.00 - 12.00 | sep 24,2014</h6>
							<img src="images/7.jpg" alt="">
							<div class="news-info">
								<p>Pellentesque ut urna eu mauris scele risque auctor volutpat et massa pers piciis iste natus scele risque auctor volutpat et massa.</p>
							</div>
						</div>
						<div class="col-md-6 news-grid news-grid-text">
							<a href="about.blade.php">Integer vitae ligula sed lectus</a>
							<h6>09.00 - 11.00 | Jun 09,2014</h6>
							<img src="images/8.jpg" alt="">
							<div class="news-info">
								<p>Pellentesque ut urna eu mauris scele risque auctor volutpat et massa pers piciis iste natus scele risque auctor volutpat et massa.</p>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<div class="news-right">
				<div class="news-left-info event-left-info">
					<div class="news-left-text event-left-text">
						<h3>Events</h3>
					</div>
					<div class="event-grids">
						<div class="event-grid">
							<h4>Pellentesque bibendum</h4>
							<h6>09.00 - 11.00 | Jun 09,2014</h6>
							<p>Duis sollicitudin vulputate felis sed iaculis. In faucibus mauris sit amet dictum rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
						</div>
						<div class="event-grid">
							<h4>Vestibulum id lorem sit</h4>
							<h6>09.00 - 11.00 | Jun 09,2014</h6>
							<p>Duis sollicitudin vulputate felis sed iaculis. In faucibus mauris sit amet dictum rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>-->
		<!-- //news -->
		@include('includes.footer')

@endsection
