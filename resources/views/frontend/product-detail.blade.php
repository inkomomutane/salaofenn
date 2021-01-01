@extends('layouts.frontendLayout')

@section('content')
<section class="section-pagetop bg-secondary">
<div class="container clearfix">
	<h2 class="title-page">Page heading</h2>

	<nav class="float-left">
	<ol class="breadcrumb  bg-white px-3 py-1">
	    <li class="breadcrumb-item"><a href="#">Home</a></li>
	    <li class="breadcrumb-item"><a href="#">Library</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Data</li>
	</ol>  
	</nav>
</div> <!-- container //  -->
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y-sm">
<div class="container">
<nav class="mb-3">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">{{ $product->subcategory->category->name }}</a></li>
    <li class="breadcrumb-item"><a href="#">{{ $product->subcategory->name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
</ol> 
</nav>

<div class="row">
<div class="col-xl-10 col-md-9 col-sm-12">


<main class="card">
	<div class="row no-gutters">
		<aside class="col-sm-6 border-right">
<article class="gallery-wrap"> 
<div class="img-big-wrap">
  <div> <a href="{{ asset('/') }}images/items/2.jpg" data-fancybox=""><img src=" {{ asset('/') }}images/items/1.jpg"></a></div>
</div> <!-- slider-product.// -->
<div class="img-small-wrap">
	<a href="{{ asset('/') }}images/items/1.jpg" data-fancybox="" class="item-gallery"><img src=" {{ asset('/') }}images/items/1.jpg"></a>
	<a href="{{ asset('/') }}images/items/2.jpg" data-fancybox="" class="item-gallery"><img src=" {{ asset('/') }}images/items/2.jpg"></a>
	<a href="{{ asset('/') }}images/items/3.jpg" data-fancybox="" class="item-gallery"><img src=" {{ asset('/') }}images/items/3.jpg"></a>
	<a href="{{ asset('/') }}images/items/4.jpg" data-fancybox="" class="item-gallery"><img src=" {{ asset('/') }}images/items/4.jpg"></a>
</div> <!-- slider-nav.// -->
</article> <!-- gallery-wrap .end// -->
		</aside>
		<aside class="col-sm-6">
<article class="card-body">
<!-- short-info-wrap -->
	<h3 class="title mb-3">{{ $product->name }}</h3>

<div class="mb-3"> 
	<var class="price h3 text-warning"> 
		<span class="currency">MZN $</span><span class="num">{{ $product->price }}</span>
	</var> 
	<span>/per unity</span> 
</div> <!-- price-detail-wrap .// -->
<dl>
  <dt>Description</dt>
  <dd><p>{{ $product->short_description}}</p></dd>
</dl>

<hr>
	<div class="row">
		<div class="col-sm-12">
			<dl class="dlist-inline">
			  <dt>Quantity: </dt>
			  <dd> 
			  	<input class="form-control form-control-sm" style="width:70px;" name = "quantity">
			  		
			  </dd>
			<!-- item-property .// -->
		<!-- col.// -->
		<!-- row.// -->
		<a href="#" class="btn  btn-warning"> <i class="fa fa-shopping-cart"></i> Adicionar a Carrinha</a>
		<a href="#" class="btn  btn-outline-warning"> Pagar </a>
		</dl>  
		</div> 
	</div>
<!-- short-info-wrap .// -->
</article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</main> <!-- card.// -->

<!-- PRODUCT DETAIL -->
<article class="card mt-3">
	<div class="card-body">
		<h4>Detail overview</h4>
	<p>{{ $product->description }}</p>
	</div> <!-- card-body.// -->
</article> <!-- card.// -->

<!-- PRODUCT DETAIL .// -->

</div> <!-- col // -->
<aside class="col-xl-2 col-md-3 col-sm-12">
<div class="card">
	<div class="card-header">
	    Trade Assurance
	</div>
	<div class="card-body small">
		 <span>China | Trading Company</span> 
		 <hr>
		 Transaction Level: Good <br> 
		 Supplier Assessments: Best 
		 <hr>
		 11 Transactions $330,000+
		 <hr>
		 Response Time 24h <br>
		 Response Rate: 94%  <br> 
		 <hr>
		 <a href="">Visit pofile</a>
		 
	</div> <!-- card-body.// -->
</div> <!-- card.// -->
</aside> <!-- col // -->
</div> <!-- row.// -->



</div><!-- container // -->
</section>
<!-- ========================= SECTION CONTENT .END// ========================= -->
@endsection