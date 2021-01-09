<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Fenn LCC">

<title>{{ config('app.name','Fenn\'sLook') }}</title>

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">

<!-- jQuery -->
<script src="{{ asset('js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('css/bootstrap-custom.css') }}" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">

<!-- plugin: fancybox  -->
<script src="{{ asset('plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
<link href="{{ asset('plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">

<!-- plugin: owl carousel  -->
<link href="{{ asset('plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- custom style -->
<link href="{{ asset('css/uikit.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>

@stack('css')

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

}); 
// jquery end
</script>

@stack('js')

</head>
<body>
<header class="section-header">
<nav class="navbar navbar-top navbar-expand-lg navbar-dark bg-secondary">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
        <li><a href="http://www.facebook.com/fenn.mz" class="nav-link"> <i class="fab fa-facebook"></i> </a></li>
		<li><a href="http://www.intagram.com/nelson_mutane" class="nav-link"> <i class="fab fa-instagram"></i> </a></li>
		<li><a href="http://www.twitter" class="nav-link"> <i class="fab fa-twitter"></i> </a></li>
      </ul>
      <ul class="navbar-nav">
		<li class="nav-item"><a href="#" class="nav-link" ><i class="fa fa-exclamation-circle"></i> Suporte & reporte </a></li>
		<li class="nav-item active">
			<a class="nav-link" href="tel: +258847607095"> <i class="fa fa-phone"></i> Contacte-nos : +258847607095 </a>
		</li>
      </ul> <!-- navbar-nav.// -->
    </div> <!-- collapse.// -->
  </div>
</nav>

<section class="header-main shadow-sm">
	<div class="container">
<div class="row align-items-center sticky-top">
	<div class="col-lg-3 col-sm-4">
	<a href="{{ url('/') }}" class="brand-wrap">
		<img class="logo" src="{{ asset('images/logos1.jpg') }}">
	</a> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-4 col-xl-5 col-sm-8">
			<form action="#" class="search-wrap">
				<div class="input-group w-100">
				    <input type="text" class="form-control" style="width:55%;" placeholder="Search">
				    <div class="input-group-append">
				      <button class="btn btn-primary" type="submit">
				        <i class="fa fa-search"></i>
				      </button>
				    </div>
			    </div>
			</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
		<div class="col-lg-3 col-sm-6 justify-content-end">
		<div class="widgets-wrap d-flex justify-content-end">
			<div class="widget-header">
				<a href="#" class="icontext">
					<div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-shopping-cart"></i></div>
					<div class="text-wrap">
						<span>3 items</span>
					</div>
				</a>
			</div> <!-- widget .// -->
			<div class="widget-header dropdown">
				<a href="#" class="icontext" data-toggle="dropdown" data-offset="20,10">
					<div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-user"></i></div>
					<div class="text-wrap">
						<span>Meu Perfil <i class="fa fa-caret-down"></i></span>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					 @if (Route::has('login'))
							@auth
								<li class="dropdown-item"><a href="{{ url('/home') }}" class="nav-link">{{ __('Home') }}</a></li>
							@else
								<li class="dropdown-item"><a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a></li>
								@if (Route::has('register'))
									<li class="dropdown-item"><a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a></li>
								@endif
							@endauth
					@endif
				</div> <!--  dropdown-menu .// -->
			</div> <!-- widget  dropdown.// -->
		</div>	<!-- widgets-wrap.// -->	
	</div> <!-- col.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->

@yield('content')


<!-- ========================= SECTION FEATURES 2 ========================= -->
<section class="section-features padding-y">
	<div class="container">
<div class="row">
<div class="col-md-3 my-2">
	<article class="box h-100 bg">
		<figure class="itembox text-center">
			<span class="icon-wrap rounded white icon-sm bg-warning"><i class="fa fa-box"></i></span>
			<figcaption class="text-wrap">
			<h5 class="title">50+ Components</h5>
			<p class="text-muted">Many components ready to use. Well arranged sass files.</p>
			</figcaption>
		</figure> <!-- iconbox // -->
	</article> <!-- panel-lg.// -->
</div><!-- col // -->
<div class="col-md-3 mb15  my-2">
	<article class="box h-100 bg">
		<figure class="itembox text-center">
			<span class="icon-wrap white rounded icon-sm bg-primary"><i class="fa fa-code"></i>	</span>
			<figcaption class="text-wrap">
			<h5 class="title">Semantic code</h5>
			<p class="text-muted">Meaningful class names and less div's. Easy to customize</p>
			</figcaption>
		</figure> <!-- iconbox // -->
	</article> <!-- panel-lg.// -->
</div> <!-- col // -->
<div class="col-md-3 mb15 my-2">
	<article class="box h-100 bg">
		<figure class="itembox text-center">
			<span class="icon-wrap white rounded icon-sm bg-success"><i class="fa fa-plug"></i>	</span>
			<figcaption class="text-wrap">
			<h5 class="title">Hand picked plugins</h5>
			<p class="text-muted">Most used popular plugins are included and ready to use</p>
			</figcaption>
		</figure> <!-- iconbox // -->
	</article> <!-- panel-lg.// -->
</div> <!-- col // -->
<div class="col-md-3 mb15 my-2">
	<article class="box h-100 bg">
		<figure class="itembox text-center">
			<span class="icon-wrap white rounded icon-sm bg-secondary"><i class="fa fa-image"></i>	</span>
			<figcaption class="text-wrap">
			<h5 class="title">Sample assets</h5>
			<p class="text-muted">Get ready to use html templates with image assets </p>
			</figcaption>
		</figure> <!-- iconbox // -->
	</article> <!-- panel-lg.// -->
</div> <!-- col // -->
</div> <!-- row.// -->


	</div> <!-- container.// -->
</section>
<!-- ========================= SECTION FEATURES 2 END// ========================= -->

<!-- ========================= FOOTER ========================= -->
<footer class="section-footer bg-secondary-dark">
	<div class="container">
		<section class="footer-top padding-top">
			<div class="row">
				<aside class="col-sm-3 col-md-3 white">
					<h5 class="title">Customer Services</h5>
					<ul class="list-unstyled">
						<li> <a href="#">Help center</a></li>
						<li> <a href="#">Money refund</a></li>
						<li> <a href="#">Terms and Policy</a></li>
						<li> <a href="#">Open dispute</a></li>
					</ul>
				</aside>
				<aside class="col-sm-3  col-md-3 white">
					<h5 class="title">My Account</h5>
					<ul class="list-unstyled">
						<li> <a href="#"> User Login </a></li>
						<li> <a href="#"> User register </a></li>
						<li> <a href="#"> Account Setting </a></li>
						<li> <a href="#"> My Orders </a></li>
						<li> <a href="#"> My Wishlist </a></li>
					</ul>
				</aside>
				<aside class="col-sm-3  col-md-3 white">
					<h5 class="title">About</h5>
					<ul class="list-unstyled">
						<li> <a href="#"> Our history </a></li>
						<li> <a href="#"> How to buy </a></li>
						<li> <a href="#"> Delivery and payment </a></li>
						<li> <a href="#"> Advertice </a></li>
						<li> <a href="#"> Partnership </a></li>
					</ul>
				</aside>
				<aside class="col-sm-3">
					<article class="white">
						<h5 class="title">Contacts</h5>
						<p>
							<strong>Phone: </strong> +123456789 <br> 
						    <strong>Fax:</strong> +123456789
						</p>
						 <div class="btn-group white">
						    <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i class="fab fa-facebook-f  fa-fw"></i></a>
						    <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i class="fab fa-instagram  fa-fw"></i></a>
						    <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i class="fab fa-youtube  fa-fw"></i></a>
						    <a class="btn btn-twitter" title="Twitter" target="_blank" href="#"><i class="fab fa-twitter  fa-fw"></i></a>
						</div>
					</article>
				</aside>
			</div> <!-- row.// -->
			<br> 
		</section>
		<section class="footer-bottom row border-top-white">
		
		</section> <!-- //footer-top -->
	</div><!-- //container -->
</footer>
<!-- ========================= FOOTER END // ========================= -->
</body>
</html>