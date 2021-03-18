@extends('layouts.frontendLayout')

@section('content')
<section class="section-pagetop bg-secondary">
<div class="container clearfix">
	<h5 class="title-page">Detalhes: <b class="alert alert-success">{{ $product->name }}</b></h5>

	<nav class="float-left my-2">
	<ol class="breadcrumb  bg-white px-3 py-1">
	    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
	    <li class="breadcrumb-item"><a href="#">{{ $product->subcategory->category->name }}</a></li>
	    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
	</ol>  
	</nav>
</div> <!-- container //  -->
</section>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y-sm">
<div class="container">
<nav class="mb-3">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="">{{ $product->subcategory->category->name }}</a></li>
    <li class="breadcrumb-item"><a href="">{{ $product->subcategory->name }}</a></li>
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
  <div> <a href="{{ $product->image }}" data-fancybox=""><img src="{{ $product->image }}"></a></div>
</div> <!-- slider-product.// -->

</article> <!-- gallery-wrap .end// -->
		</aside>
		<aside class="col-sm-6">
<article class="card-body">
<!-- short-info-wrap -->
	<h3 class="title mb-3">{{ $product->name }}</h3>

<div class="mb-3"> 
	<var class="price h3 text-warning"> 
		<span class="currency">MZN </span><span class="num">{{ $product->price }}</span>
	</var> 
	<span>/Por unidade</span> 
</div> <!-- price-detail-wrap .// -->
<div class="mb-3"> 
	<var class="price h3 text-danger"> 
		<span class="currency"> </span><span class="num">{{ $product->promotion }}%</span>
	</var> 
	<span>De desconto por unidade</span> 
</div> <!-- price-detail-wrap .// -->
<dl>
  <dt>Breve descrição</dt>
  <dd><p>{{ $product->short_description}}</p></dd>
</dl>

<hr>
	<div class="row">
		<div class="col-sm-12">
			<dl class="dlist-inline">
		<!-- row.// -->
		<a href="{{ route('cart', ['product'=>$product->id]) }}" class="btn  btn-primary"> <i class="fa fa-shopping-cart"></i> Adicionar a Carrinha</a>
		<a href="{{ route('comprar',$product->id) }}" class="btn  btn-success"> <i class="fa fa-money-bill-alt"></i> Comprar</a>
		<a href="{{ route('favorite',$product->id) }}" class="btn  btn-danger"> <i class="fa fa-heart"></i> Adicionar a Favoritos</a>
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
		<h4>Descrição mais detalhada</h4>
	<p><pre>{{ $product->description }}</pre></p>
	</div> <!-- card-body.// -->
</article> <!-- card.// -->

<!-- PRODUCT DETAIL .// -->

</div> <!-- col // -->
</div> <!-- row.// -->



</div><!-- container // -->
</section>
<!-- ========================= SECTION CONTENT .END// ========================= -->
@endsection