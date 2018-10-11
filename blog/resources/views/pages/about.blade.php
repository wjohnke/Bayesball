@extends('layouts.app')
@section('content')
<style>
	#pics{
		height: 400px;
		width: 400px;
	}


</style>
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
							<h2>BayesBall</h2>
							<h4>By the BayesBall team</h4>
							<p>A passionate group dedicated to the pursuit and execution of solving challenging problems. We strive to find solutions to challenging problems, both logically and creatively.</p>
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
						<img src="images/Randall.png" alt="">
						<h6>Randall Young</h6>
						<p> Senior at Mizzou, Interested in backend work and anything low level, using PHP, C, C++, Rust, Swift, NodeJS, Haskell.
                        </p>

					</div>
					<div class="col-md-3 team-grid">
						<img src="images/Han.png" alt="">
						<h6>Han Song</h6>
						<p>senior student at Mizzou, I’m interested in web and app development, artificial intelligence, and database. My skills are c, c#, c++, java, sql, PHP, Html, and Haskell.
                        </p>
					</div>
					<div class="col-md-3 team-grid">
						<img src="images/David.png" alt="">
						<h6>David Heritage</h6>
						<p> Senior at Mizzou, interested in web development as well as app and backend development. I would like to further explore machine learning and artificial intelligence. My skills are C, C++, Java, HTML, Javascript, Appian, and PHP.
                        </p>
					</div>
					<div class="col-md-3 team-grid">
						<img src="images/Jhon.png" alt="">
						<h6>John Jolley</h6>
						<p> John is a senior at Mizzou who is interested in frontend and web development. John works best in HTML, CSS, and Javascript, and has worked with PHP, relational and nonrelational databases.
                        </p>
					</div>
                    <div class="col-md-3 team-grid">
                        <img src="images/Will.png" alt="">
                        <h6>William Johnke</h6>
                        <p> Senior at Mizzou, Interested in database administration and web development, as well as some AI. Experience with Java, C, Haskell, PHP, MySQL & PostgreSQL, HTML, CSS, and Javascript</p>
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
		@include('includes.footer')

	@endsection