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
<section class="section-content bg padding-y border-top">
<div class="container">

<div class="row">
	<main class="col-sm-9">

<div class="card">
<table class="table table-hover shopping-cart-wrap response">
<thead class="text-muted">
<tr>
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200">Action</th>
</tr>
</thead>
<tbody>

	@foreach ($carts as $cart)
		<tr>
	<td>
		<figure class="media">
			<div class="img-wrap"><img src="images/items/1.jpg" class="img-thumbnail img-sm"></div>
			<figcaption class="media-body">
				<h6 class="title text-truncate">{{ $cart->product->name }}</h6>
				<dl class="dlist-inline small">
				<dt>Promotion: - {{ $cart->product->promotion }}%</dt>
			</figcaption>
		</figure> 
	</td>
	<td> 
		<input class="form-control" name="quantity" value="{{ $cart->quantity }}"></input> 
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">USD {{ $cart->product->price }}</var> 
			<small class="text-muted">(USD5 each)</small> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-outline-success" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
	<a href="" class="btn btn-outline-danger"> × Remove</a>
	</td>
</tr>
	@endforeach


</tbody>
</table>
</div> <!-- card.// -->

	</main> <!-- col.// -->
	<aside class="col-sm-3">
<p class="alert alert-success">Efetue o pagamento com o método mais adequado. </p>
<dl class="dlist-align">
  <dt>Total price: </dt>
  {{-- $carts->pluck('product_id') --}}
  <dd class="text-right">USD {{App\Product::whereIn('id',$carts->pluck('product_id'))->pluck('price')->sum()}}</dd>
</dl>
<dl class="dlist-align">
  <dt>Discount:</dt>
  <dd class="text-right">USD {{(
  App\Product::whereIn('id',$carts->pluck('product_id'))->pluck('price')->sum()
  *
   App\Product::whereIn('id',$carts->pluck('product_id'))->pluck('promotion')->sum())/100
   }}</dd>
</dl>
<dl class="dlist-align h4">
  <dt>Total:</dt>
  <dd class="text-right"><strong>USD  {{
	  App\Product::whereIn('id',$carts->pluck('product_id'))->pluck('price')->sum()
	  -
  (
  App\Product::whereIn('id',$carts->pluck('product_id'))->pluck('price')->sum()
  *
   App\Product::whereIn('id',$carts->pluck('product_id'))->pluck('promotion')->sum())/100
   }}</strong></dd>
</dl>
<hr>
<a href="{{ route('payment.index') }}">
<figure class="itemside mb-3 active_category" style="background:rgb(245, 129, 129)">
	<aside class="aside"><img src="images/mpesa.jpg"></aside>
	 <div class="text-wrap small text-muted">
		 Pagamento Via M-pesa
	 </div>
</figure>
</a>
	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



@endsection