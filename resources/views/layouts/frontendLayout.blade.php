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
<style>
	.card>img{
		height: 180px;
		width: 180px;
		box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.281) !important;
		border-radius: 3px
	}
</style>
@stack('css')

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

}); 
// jquery end
</script>



</head>
<body >
	<div id="app">
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
						<a href="{{route('carts')}}" class="icontext">
							<div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-shopping-cart"></i></div>
							<div class="text-wrap">
								@auth
										<span>
										{{
											Auth::user()->carts->count()
										}} items</span>
									@else
											<span>?</span>
								@endauth
							
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
</div>

<!-- ========================= SECTION FEATURES 2 ========================= -->
<section class="section-features padding-y">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
				<div class="card">
					<img src="{{ asset('/images/posts/h1.jpg') }}" alt="" srcset="">
					
					<div class="card-body">
						<h6 class="card-title">
						Euria Marcos</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="card">
					<img src="{{ asset('/images/posts/h2.jpg') }}" alt="" srcset="">
					
					<div class="card-body">
						<h6 class="card-title">
						Euria Marcos</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="card">
					<img src="{{ asset('/images/posts/h3.jpg') }}" alt="" srcset="">
					
					<div class="card-body">
						<h6 class="card-title">
						Euria Marcos</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="card">
					<img src="{{ asset('/images/posts/h4.jpg') }}" alt="" srcset="">
					
					<div class="card-body">
						<h6 class="card-title">
						Euria Marcos</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="card">
					<img src="{{ asset('/images/posts/h5.jpg') }}" alt="" srcset="">
					
					<div class="card-body">
						<h6 class="card-title">
						Euria Marcos</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="card">
					<img src="{{ asset('/images/posts/h6.jpg') }}" alt="" srcset="">
					
					<div class="card-body">
						<h6 class="card-title">
						Euria Marcos</h6>
					</div>
				</div>
			</div>
		</div> <!-- row.// -->
	</div>
</section>
<!-- ========================= SECTION FEATURES 2 END// ========================= -->

<!-- ========================= FOOTER ========================= -->
<footer class="section-footer bg-secondary-dark">
	<div class="container">
		<section class="footer-top padding-top">
			<div class="row">
				<aside class="col-sm-3  col-md-3 white">
					<h5 class="title">Minha conta</h5>
					<ul class="list-unstyled">
						<li> <a href="{{ route('login') }}"> Login </a></li>
						<li> <a href="{{ route('register') }}"> register </a></li>
						<li> <a href="{{ route('user.profile') }}"> Meu Perfil </a></li>
						<li> <a href="{{ route('order.cart') }}"> Carrinha </a></li>
						<li> <a href="{{ route('favorites') }}"> favoritos </a></li>
					</ul>
				</aside>
				<aside class="col-sm-6  col-md-6 white">
					<h5 class="title">Localizacao</h5>
					<ul class="list-unstyled bg-white" >
						<iframe class="col-sm-12 shadow-sm" style="padding:0;margin:0; border:none !important"  src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5009.793394958432!2d34.856202118514865!3d-19.83549253924872!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2smz!4v1615929332490!5m2!1spt-BR!2smz"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</ul>
				</aside>
				<aside class="col-sm-3">
					<article class="white">
						<h5 class="title">Contactos</h5>
						<p>
							<strong>Telefone: </strong> +258 84 502 3119 <br> 
						</p>
						 <div class="btn-group white">
						    <a class="btn btn-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/fenn.mz"><i class="fab fa-facebook-f  fa-fw"></i></a>
						    <a class="btn btn-instagram" title="Instagram" target="_blank" href="https://www.instagram.com/fenn.mz"><i class="fab fa-instagram  fa-fw"></i></a>
						    <a class="btn btn-youtube" title="Youtube" target="_blank" href="https://www.youtube.com/fenn.mz"><i class="fab fa-youtube  fa-fw"></i></a>
						    <a class="btn btn-twitter" title="Twitter" target="_blank" href="https://www.twitter.com/fenn.mz"><i class="fab fa-twitter  fa-fw"></i></a>
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
@stack('js')
<!-- ========================= FOOTER END // ========================= -->
</body>
</html>