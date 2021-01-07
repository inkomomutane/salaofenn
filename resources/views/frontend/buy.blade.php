@extends('layouts.frontendLayout')
@section('content')

@php
	$order  = \App\Order::find(1);
	$order->sera  = 3;
@endphp

{{ $order }}


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
</tr>
</thead>
<tbody>

		<tr>
	<td>
		<figure class="media">
			<div class="img-wrap"><img src="{{ asset('images/items/1.jpg') }}" class="img-thumbnail img-sm"></div>
			<figcaption class="media-body">
				<h6 class="title text-truncate">{{ $product->name }}</h6>
				<dl class="dlist-inline small">
				<dt>Promotion: - {{ $product->promotion }}%</dt>
			</figcaption>
		</figure> 
	</td>
	<td>

		<form method="POST" action="{{ route('order.store') }}" id="order">
			@csrf

		<input type="hidden" name="client_name" value="{{ Auth::user()->name }}">
		<input type="hidden" name="product_or_service_name" value="{{ $product->name }}">
		<input class="form-control"  type="number" min="0" name="quantity" onchange="dart(this)" onmouseover="dart(this)" id="qty" value="0">
		<input type = "hidden" name="total_price">
		<input type="hidden" name="maded_by" value="{{ Auth::user()->name }}">
		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		<input type="hidden" name="payment_id" value="1">
		<input type="hidden" name="status_id" value="0">
		<input type="hidden" name = "contact" value="847607095">
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">USD {{ $product->price }}</var> 
			<small class="text-muted">(USD each)</small> 
		</div> <!-- price-wrap .// -->
	</td>
</tr>


</tbody>
</table>
</div> <!-- card.// -->

	</main> <!-- col.// -->
	<aside class="col-sm-3">
<p class="alert alert-success">Efetue o pagamento com o método mais adequado. </p>
<dl class="dlist-align">
  <dt>Subtotal: </dt>
  {{-- $carts->pluck('product_id') --}}
  <dd class="text-right">MZN <t id="subtotal"></t> </dd>
</dl>
<dl class="dlist-align">
  <dt>Desconto:</dt>
  <dd class="text-right">MZN <t id="descount"></t></dd>
</dl>
<dl class="dlist-align h4">
  <dt>Total:</dt>
  <dd class="text-right"><strong>MZN  <t id="total"></t></strong></dd>
</dl>
<hr>
<button type="submit" class = "btn btn-danger" value=" Pagamento Via M-pesa" id="send">
<figure class="itemside">
	<aside class=""><img src="{{ asset('images/mpesa.jpg') }}"> Pagamento Via M-pesa</aside>
</figure>
</button>
	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
 </form>
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<script>
	

	function dart(dart){
		if(dart.value == NaN || dart.value == undefined) {
			dart.value = 0;
		}
		var subtotal =  document.querySelector('#subtotal').innerHTML = dart.value * {!! $product->price !!};
		var descount =  document.querySelector('#descount').innerHTML = dart.value * {!! ($product->price * ($product->promotion/100) ) !!};
		var total = subtotal - descount;
		document.querySelector('#total').innerHTML = total;
	}

	$(document).ready(function () {

		dart($('#qty'));
	});
	
	$('#send').click(function(e){
		e.preventDefault();
		qty  = $('#order')[0]['quantity'].value;
		var subtotal =  qty * {!! $product->price !!};
		var descount =  qty * {!! ($product->price * ($product->promotion/100) ) !!};
		var total = subtotal - descount;
		$('#order')[0]['total_price'].value = total;
		var form   = $('#order').serializeArray();
		console.log(form);
		$('#order').submit();
	});
</script>

@endsection