@extends('layouts.frontendLayout')

@section('content')
@push('css')
	
	<link rel="stylesheet" href="{{ asset('css/bootstrap-multiselect.css') }}" type="text/css"/>
@endpush


<section class="section-pagetop bg-secondary">
<div class="container clearfix">
	<h2 class="title-page">Page heading</h2>

	<nav class="float-left">
	<ol class="breadcrumb  bg-white px-3 py-1">
	    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
	    <li class="breadcrumb-item"><a href="#">Filtros</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Todos(Produtos e serviços)</li>
	</ol>  
	</nav>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION CONTENT ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y-sm">
<div class="container">
<div class="card">
	<div class="card-body">
<div class="row">
	<!-- col.// -->
	
	<div class="col-md-2-24"> <strong>Filtrar por:</strong></div> <!-- col.// -->
	
</div> <!-- row.// -->
<hr>
<div class="row">
	<div class="col-12"> 
		<form method="post" action="{{ route('filter') }}" id="xxpf">
			@csrf
			
		<ul class="list-inline">
			<li class="list-inline-item">
		  		<label class="mr-1">cat's</label>
				<select id="example-getting-started" multiple="multiple" name ="categories[]" class="list-inline-item dropdown" value="0">
					@foreach (App\Category::all() as $item)
						<option value="{{ $item->id }}" >{{ $item->name }}</option>
					@endforeach
				</select>
		  </li>
		   <li class="list-inline-item">
		  		<label class="mr-1">subcat's</label>
				<select id="example-getting-started2" multiple="multiple" name ="subcategories[]" class="list-inline-item dropdown" value="0">
					@foreach (App\SubCategory::all() as $item)
						<option value="{{ $item->id }}" >{{ $item->name }}</option>
					@endforeach
				</select>
		  </li>
		  <li class="list-inline-item">
		  		<label class="mr-1">tags</label>
				<select id="example-getting-started3" multiple="multiple" name ="tags[]" class="form-control form-control-sm">
					@foreach (App\Tag::all() as $item)
						<option value="{{ $item->id }}" >{{ $item->name }}</option>
					@endforeach
				</select>
		  </li>

		  <li class="list-inline-item">
		  	<div class="form-inline">
		  		<label class="mr-1">preços</label>
				<input class="form-control form-control-sm" name= 'minPrice' placeholder="Min" type="number">
					<span class="px-2"> - </span>
				<input class="form-control form-control-sm" name='maxPrice' placeholder="Max" type="number">
				<button type="submit" class="btn btn-success btn-sm ml-2" value="Ok" id="xf"><i class="fa fa-search" > </i> Filtrar</button>
			  </form>
			  <a class = "btn  btn-warning btn-sm ml-2" href = "{{ route('filter') }}"><i class="fa fa-sync" ></i> Remover filtro</a>
			</div>
		  </li>
		</ul>
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- card-body .// -->
</div> <!-- card.// -->


<div class="padding-y-sm">
<span> {{ $products->total() }} resultados encontrados.</span>	
</div>

<div class="row-sm py-2">
@foreach ($products as $product)
	<div class="col-md-3 col-sm-6">
			<figure class="card card-product">
							<span class="badge-offer"><b> - {{$product->promotion}}%</b></span>
							<div class="img-wrap"> <a href="{{ asset('/') }}images/items/1.jpg" data-fancybox="" class="item-gallery"><img src=" {{ asset('/') }}images/items/1.jpg"></a><a class="btn-overlay" href="{{ route('product_detail', ['product'=>$product->id]) }}"><i class="fa fa-search-plus"></i>Ver Detalhes</a></div>
							<figcaption class="info-wrap text-center">
								<h6 class="title text-truncate"><a href="{{ route('product_detail', ['product'=>$product->id]) }}">{{$product->name}}</a></h6>
								<dl class="dlist-align">
								<dt>Categoria</dt>
								<dd >
									<ol class="breadcrumb  px-3 py-1" style="background:gray; ">
										<li class="breadcrumb-item active" aria-current="page" style="color: rgb(211, 210, 210)"><a href="#" style="color:white">
											@if ($product->subcategory !=null)
												{{ $product->subcategory->category->name }}	
											@endif
											
										</a></li>
									</ol>
								</dd>
								</dl> 
							</figcaption>

				


							<div class="bottom-wrap">

								@if ($product->subcategory !=null)
										@if ($product->subcategory->category->id == 1)
									<a href="" class="btn btn-sm btn-success float-right ">
										<i class="fa fa-money-bill-alt"></i>
										Comprar 
									</a>	
									<a href = ""  class = "btn btn-sm btn-info float-left "><i class = "fa fa-shopping-cart"></i>+ Carrinha</a>
									<br><br>
										@else
										<a href="" class="btn btn-sm btn-success float-right ">
										<i class="fa fa-clock"></i>
										
										Agendar
									</a>	
									<a href = ""  class = "btn btn-sm btn-danger float-left "><i class = "fa fa-heart"></i>+ a Favoritos</a>
									<br><br>
								@endif
								@endif
							
								<div class="price-wrap h5" style="font-weight:bold; font-size:15px">
									<span class="price-new my-2" style="color: green; ">${{ $product->price - (($product->price * $product->promotion)/100)  }}</span> <del class="price-old float-right " style="color: red">${{$product->price }}</del>
								</div> <!-- price-wrap.// -->

							</div>
							 <!-- bottom-wrap.// -->
						</figure>
	</div>
@endforeach
</div> <!-- row.// -->

{{ $products->links() }}

</div><!-- container // -->
</section>
<!-- ========================= SECTION CONTENT .END// ========================= -->
@push('js')
	<script type="text/javascript" src="{{ asset('js/bootstrap-multiselect.js') }}"></script>

	<script>
		 $(document).ready(function() {
			 $('#example-getting-started').multiselect(
				{
					includeSelectAllOption: true,
					numberDisplayed: 1,
					enableFiltering: true,
					maxHeight: 250,
					enableCaseInsensitiveFiltering:true,
					includeFilterClearBtn: true
				}
			);
			$('#example-getting-started2').multiselect(
				{
					includeSelectAllOption: true,
					numberDisplayed: 1,
					enableFiltering: true,
					maxHeight: 250,
					enableCaseInsensitiveFiltering:true,
					includeFilterClearBtn: true
				}
			);
			$('#example-getting-started3').multiselect(
				{
					includeSelectAllOption: true,
					numberDisplayed: 1,
					enableFiltering: true,
					maxHeight: 250,
					enableCaseInsensitiveFiltering:true,
					includeFilterClearBtn: true
				}
			);

			$('#xf').on('mouseover',function(){
				console.log($('#xxpf').serialize());
			});
    });
	</script>
@endpush
@endsection
