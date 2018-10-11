@extends('layouts.app')
@section('content')
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
		@include('includes.footer')
@endsection