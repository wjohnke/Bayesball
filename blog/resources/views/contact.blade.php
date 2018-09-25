<!DOCTYPE html>
<html>
<head>
<title>Contact</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Baseball Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--// bootstrap-css -->
	<!-- css -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link href="css/styles.css?v=1.6" rel="stylesheet">
	<!--// css -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/scripts.js?v=1.7"></script>
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
	</script>

</head>
<body>
	<div class="main-content">
		<!-- header -->
		<div class="navigation">
			<div class="container-wrap-fluid">
				<nav class="pull">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="hvr-bounce-to-bottom"><a href="{{url('/')}}">Home</a></li>
							<li class="hvr-bounce-to-bottom"><a href="{{url('/about')}}">About</a></li>


							<!-- script-for-menu -->
							<script>
                                $( "li a.menu1" ).click(function() {
                                    $( "ul.nav-sub" ).slideToggle( 300, function() {
                                        // Animation complete.
                                    });
                                });
							</script>
							<li><a href="{{url('/contact')}}"class="active">Contact</a></li>
						</ul>
						<div class="clearfix"> </div>
					</div>
				</nav>
			</div>
		</div>
		<div class="header-top">
				<div class="head-logo">
					<h1><a href="{{url('/')}}">Bayes Ball</a></h1>
				</div>
				<div class="top-nav">
					<div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
						<a href="#"><img src="images/menu.png" alt=""></a>
					</div>	
				</div>
				<div class="header-right">
					<div class="social">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="facebook twitter"> </a></li>
							<li><a href="#" class="facebook chrome"> </a></li>
							<li><a href="#" class="facebook dribbble"> </a></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>				
				<div class="clearfix"> </div>
		</div>
		<!-- //header -->
		<!-- contact -->
		<div class="contact">
			<!-- container-wrap -->
			<div class="container-wrap">
				<div class="contact-info">
					<h2>Contact</h2>
				</div>
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d99296.49783267855!2d-92.4010505011079!3d38.94647296871662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87dcb79505ed8739%3A0xc18305329c07fb48!2sUniversity+of+Missouri!5e0!3m2!1sen!2sus!4v1537897164099" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="mail-grids">
					<div class="col-md-6 mail-grid-left">
						<h3>Address</h3>
						<h5>Cras porttitor imperdiet volutpat nulla malesuada lectus eros <span>ut convallis felis consectetur ut </span></h5>
						<h4>Headquarters</h4>
						<p>756 GT. Globel Place.
							<span>CG 09-123</span>
							Italy, Ba. 4567
						</p>
						<h4>Get In Touch</h4>
						<p>Telephone: +1 234 567 9871
							<span>FAX: +1 234 567 9871</span>
							E-mail: <a href="mailto:info@example.com">mail@example.com</a>
						</p>
					</div>
					<div class="col-md-6 contact-form">
						<form>
							<input type="text" placeholder="Name" required="">
							<input type="text" placeholder="Email" required="">
							<input type="text" placeholder="Subject" required="">
							<textarea placeholder="Message" required=""></textarea>
							<input type="submit" value="SEND">
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container-wrap -->
		</div>
		<!-- //contact -->
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
									<li><a href="{{url('/about')}}">About</a></li>
									<li><a href="{{url('/contact')}}"class="active">Contact</a></li>
								</ul>
							</div>
							<div class="copyright">
								<p>Copyright &copy; .<a target="_blank" href=""></a></p>
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
</body>	
</html>