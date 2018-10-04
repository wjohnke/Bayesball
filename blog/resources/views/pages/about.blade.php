@extends('layouts.app')
@section('content')
		<!-- about -->
		<!-- about-top -->
		<div class="about-top">
			<!-- container-wrap -->
			<div class="container-wrap">
				<div class="about-info">
					<h2>About</h2>
				</div>
				<div class="about-grids about-top-grids">
						<div class="col-md-6 about-left">
							<h2>A brief history of about us</h2>
							<h4>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor.</h4>
							<p>Donec ac ultrices turpis. Nunc ac ante dolor. Maecenas eget lectus vitae risus finibus aliquet. Maecenas in erat id elit convallis tristique. Mauris blandit sed metus vitae dignissim. Aliquam euismod ex vel faucibus viverra. Fusce quis efficitur libero, a facilisis magna.</p>
						</div>
						<div class="col-md-6 about-right">
							<img src="images/2.png" alt="">
						</div>
						<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- about-top -->
		<!-- about-team -->
		<div class="about-team">
			<!-- container-wrap -->
			<div class="container-wrap">
				<h4>Our Team</h4>
				<div class="team-grids">
					<div class="col-md-3 team-grid">
						<img src="images/t1.jpg" alt="">
						<h6>convallis id mauris</h6>
						<p> Curabitur orci massa convallis id mauris sed venenatis porttitor at leo nec purus</p>
					</div>
					<div class="col-md-3 team-grid">
						<img src="images/t2.jpg" alt="">
						<h6>massa convallis</h6>
						<p> Curabitur orci massa convallis id mauris sed venenatis porttitor at leo nec purus</p>
					</div>
					<div class="col-md-3 team-grid">
						<img src="images/t3.jpg" alt="">
						<h6>leonec purus</h6>
						<p> Curabitur orci massa convallis id mauris sed venenatis porttitor at leo nec purus</p>
					</div>
					<div class="col-md-3 team-grid">
						<img src="images/t4.jpg" alt="">
						<h6>venenatis portt</h6>
						<p> Curabitur orci massa convallis id mauris sed venenatis porttitor at leo nec purus</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container-wrap -->
		</div>
		<!-- //about-team -->
		<!-- about-bottom -->
		<div class="about-bottom">
			<!-- container-wrap -->
			<div class="container-wrap">
				<h3>Your Guarantees</h3>
				<div class="about-bottom-grids">
					<div class="col-md-6 about-bottom-left">
						<h4>Morbi convallis urna sit amet feugiat</h4>
						<p>Vivamus sit amet molestie orci. Nullam porttitor porta lobortis. Mauris semper feugiat varius. Mauris nec ligula 
							diam. Cras ullamcorper lorem eu sapien viverra cursus. Pellentesque commodo libero eget malesuada blandit. 
							<span>Integer at imperdiet orci. Donec laoreet dignissim ex, vitae hendrerit nulla. Praesent efficitur ex vel tempus 
							blandit. Nunc sed purus ac sapien cursus eleifend vitae id ipsum. Mauris nec vehicula est. </span>
							Nullam ac odio massa nullam et condimentum magna, eget congue dui.Sed sit amet laoreet libero. Duis faucibus 
							felis et dolor ultrices pulvinar eu at orci.
						</p>
					</div>
					<div class="col-md-6 about-bottom-left about-bottom-right">
						<h4>Morbi convallis urna sit amet feugiat</h4>
						<p>Vivamus sit amet molestie orci. Nullam porttitor porta lobortis. Mauris semper feugiat varius. Mauris nec ligula 
							diam. Cras ullamcorper lorem eu sapien viverra cursus. Pellentesque commodo libero eget malesuada blandit. 
							<span>Integer at imperdiet orci. Donec laoreet dignissim ex, vitae hendrerit nulla. Praesent efficitur ex vel tempus 
							blandit. Nunc sed purus ac sapien cursus eleifend vitae id ipsum. Mauris nec vehicula est. </span>
							Nullam ac odio massa nullam et condimentum magna, eget congue dui.Sed sit amet laoreet libero. Duis faucibus 
							felis et dolor ultrices pulvinar eu at orci.
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container-wrap -->
		</div>
		<!-- //about-bottom -->
		<!-- //about -->
		<!-- footer -->
		<div class="footer">
			<!-- container-wrap -->
			<div class="container-wrap">
				<div class="footer-top">
						<div class="footer-grids">
							<div class="col-md-3 f-address">
								<h5>Address</h5>
								<ul>
									<li>756 gt globel Place,</li>
									<li>CD-Road,M 07 435.</li>
									<li>Telephone: +1 234 567 9871</li>
									<li>FAX: +1 234 567 9871</li>
									<li>E-mail : <a href="mailto:example@email.com">Example@mail.com</a></li>
								</ul>
							</div>
							<div class="col-md-3 f-address f-phone">
								<h5>Phone</h5>
								<div class="f-address-text">
									<p>+1 234 456 7890</p>
									<p>+1 456 789 3450</p>
								</div>
							</div>
							<div class="col-md-6 f-address f-contact">
								<h5>Stay in Touch</h5>
								<form>
									<input type="text" placeholder="Email address" required="">
									<input type="submit" value="Subscribe">
								</form>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="footer-bottom">
							<div class="footer-nav">
								<ul>
									<li><a href="{{url('/')}}" >Home</a></li>
									<li><a href="{{url('/about')}}"class="active">About</a></li>
									<li><a href="{{url('/contact')}}">Contact</a></li>
								</ul>
							</div>
							<div class="copyright">
								<p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href=""></a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
				</div>
			</div>
			<!-- //container-wrap -->
		</div>
		<!-- //footer -->
	</div>
	<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			container-wrapID: 'toTop', // fading element id
											container-wrapHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
									<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- content-Get-in-touch -->

	@endsection