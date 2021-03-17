@extends('layouts.frontendLayout')
@section('content')

	<h2 class="title-page"><i class="fa fa-shopping-basket"></i> Comprar: <b class="alert alert-success">{{ $product->name }}</b></h2>

	<nav class="float-left">
	<ol class="breadcrumb  bg-white px-3 py-1">
	    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
	    <li class="breadcrumb-item active"  aria-current="page"><a href="" style="color: gray">Comprar</a></li>
	</ol>  
	</nav>
</div> <!-- container //  -->
</section>


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y border-top">
<div class="container">
	 @if (session('error'))
                        <div class="alert alert-danger shadow-sm" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

<div class="row">
	<main class="col-sm-9">

<div class="card">
<table class="table table-hover shopping-cart-wrap response">
<thead class="text-muted">
<tr>
  <th scope="col">Produto</th>
  <th scope="col" width="320">Quantidade</th>
  <th scope="col" width="320">Preco</th>
</tr>
</thead>
<tbody>

		<tr>
	<td>
		<figure class="media">
			<div class="img-wrap"><img src="{{ $product->image}}" class="img-thumbnail img-sm"></div>
			<figcaption class="media-body">
				<h6 class="title text-truncate">{{ $product->name }}</h6>
				<dl class="dlist-inline small">
				<dt>Promotion: - {{ $product->promotion }}%</dt>
			</figcaption>
		</figure> 
	</td>
	<td>

		<form method="POST" action="{{ route('order.storeWeb') }}" id="order">
			@csrf

		<input type="hidden" name="client_name" value="{{ Auth::user()->name }}">
		<input type="hidden" name="product_or_service_name" value="{{ $product->name }}">
		<input class="form-control"  type="number" min="0" name="quantity" onchange="dart(this)" onmouseover="dart(this)"  onkeypress="dart(this)" onkeyup="dart(this)" onkeydown="dart(this)" id="qty" value="{{ old('quantity') }}">
		<input type = "hidden" name="total_price">
		<input type="hidden" name="maded_by" value="{{ Auth::user()->name }}">
		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
		<input type="hidden" name="payment_id" value="1">
		<input type="hidden" name="status_id" value="0">
		
	</td>
	
	<td> 
		<div class="price-wrap"> 
			<var class="price">MZN {{ $product->price }}</var> 
			<small class="text-muted">(MZN Cada)</small> 
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


<!-- Modal -->
<div class="modal fade" id="Mpesa" tabindex="-1" role="dialog" aria-labelledby="MpesaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MpesaLabel">Efetuar Pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

		<div class="form-group">
		  <label for="">Contacto</label>
        <input type="text" name = "contact" value="{{old('contact')}}" class="form-control" placeholder =  "Ex: 847607095">
		  <small id="helpId" class="text-muted">Contacto</small>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="send">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<button type="button" class = "btn btn-danger" value=" Pagamento Via M-pesa" data-toggle="modal" data-target="#Mpesa">
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
		var quantity = $('#qty')[0].value;
		var subtotal = quantity * {!! $product->price !!};
		var descount =  quantity * {!! ($product->price * ($product->promotion/100) ) !!};
		var total = subtotal - descount;
		$("#order :input[name= total_price]")[0].value = total;
		console.log($("#order :input[name= total_price]")[0].value);
		$('#order').submit();
	});
</script>
@endsection