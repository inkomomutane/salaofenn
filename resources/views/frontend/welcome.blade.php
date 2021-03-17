@extends('layouts.frontendLayout')

@section('content')

<section class="section-pagetop bg-secondary">
<div class="container clearfix">
	<h2 class="title-page">Bem vindo a Fenn's Look</h2>

	<nav class="float-left">
	<ol class="breadcrumb  bg-white px-3 py-1">
	    <li class="breadcrumb-item active"><a href="{{ url('/') }}">{{ __('Inicial') }}</a></li> 
	</ol>  
	</nav>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION MAIN ========================= -->
<section class="section-main bg padding-top-sm">
<div class="container">

<div class="row-sm">
	<div class="col-md-8">


<!-- ================= main slide ================= -->
<div class="owl-init slider-main owl-carousel shadow" data-items="1" data-dots="false" data-nav="true">
	<div class="item-slide">
		<a href="images/banners/salaofenn/1.jpg" data-fancybox="" class="item-gallery"><img src="images/banners/salaofenn/1.jpg"></a>
	</div>
	<div class="item-slide rounded">	<a href="images/banners/salaofenn/2.jpg" data-fancybox="" class="item-gallery"><img src="images/banners/salaofenn/2.jpg"></a>
	
	</div>
	<div class="item-slide rounded">
			<a href="images/banners/salaofenn/3.jpg" data-fancybox="" class="item-gallery"><img src="images/banners/salaofenn/3.jpg"></a>
	
	</div>
</div>
<!-- ============== main slidesow .end // ============= -->

	</div> <!-- col.// -->
	<aside class="col-md-4 p-2" >
		@foreach (\App\Product::all()->random(3) as $product )
		
			<div class="card mb-3 p-2">
			<figure class="itemside">
				<div class="aside"><div class="img-wrap border-right"><img src="{{$product->image}}"></div></div>
				<figcaption class="text-wrap align-self-center">
					<h6 class="title">{{ $product->name }}</h6>
					<dl class="dlist-align">
						<dt>Categoria</dt>
						<dd >
							<ol class="breadcrumb  px-3 py-1" style="background:gray; ">
								<li class="breadcrumb-item active" aria-current="page" style="color: rgb(211, 210, 210)"><a href="#" onclick="$('#hashx{{ $product->subcategory->category->id}}').submit()" style="color:white">{{$product->subcategory->category->name }}</a></li>
							</ol>
						</dd>
						</dl> 
						 <!-- item-property-hor .// -->
						 <form action="{{ route('filter') }}" method="POst" id="hashx{{ $product->subcategory->category->id }}"> 
						@csrf
						<input type="hidden" name="categories[]" value="{{$product->subcategory->category->id}}">
						
					</form>
				</figcaption>
			</figure>
			</div> <!-- card.// -->
		@endforeach
	</aside>
</div>
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y">
<div class="container">

<div class="row">
	<aside class="col-sm-3">

<div class="card card-filter">
	<article class="card-group-item">
		<header class="card-header">
			<a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">Filtrar por Categoria</h6>
			</a>
		</header>
		<div style="" class="filter-content collapse show" id="collapse22">
			<div class="card-body">
				
				
				<ul class="list-unstyled list-lg">
					<a href="{{ route('filter') }}">
						<li  class="active_category">Todas<span class="float-right badge badge-light round">
									{{ App\Product::count() }}
							</span>
						</li>
					</a>
					@foreach (App\Category::all() as  $category)
						<form action="{{ route('filter') }}" method="POst" id="hash{{ $category->id }}"> 
						@csrf
						<input type="hidden" name="categories[]" value="{{ $category->id }}">
						<a href="#" onclick="$('#hash{{ $category->id }}').submit()">
							<li>{{ $category->name}} <span class="float-right badge badge-light round">
									{{ App\Product::whereIn('sub_category_id',App\SubCategory::where('category_id',$category->id)->get('id'))->count() }}
								</span>
							</li>
						</a>
					</form>
					@endforeach
					
				</ul>  
				
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->
	<article class="card-group-item">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse33">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">Por Preço</h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse33">
			<form action="{{ route('filter') }}" method="POst"> 
						@csrf
			<div class="card-body">
				<div class="form-row">
				<div class="form-group col-md-6">
				  <label>Mínimo</label>
				  <input class="form-control" placeholder="$0" name="minPrice" type="number">
				</div>
				<div class="form-group text-right col-md-6">
				  <label>Maximo</label>
				  <input class="form-control" placeholder="$1,0000" name="maxPrice" type="number">
				</div>
				</div> <!-- form-row.// -->
			</div> <!-- card-body.// -->
			<button class="btn btn-block btn-outline-primary">Filtrar</button>
			</form>
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->

</div> <!-- card.// -->


	</aside> <!-- col.// -->
	<main class="col-sm-9">
		@foreach ($categories->first()->products->slice(0,3) as $product )
			<article class="card card-product">
			<div class="card-body">
			<div class="row">
				<aside class="col-sm-3" style="background-image: url('{{ $product->image }}');background-position-x: center;border-radius: 3px;padding: 0;margin: 0;">
			
				</aside> <!-- col.// -->
				<article class="col-sm-5">
						<h4 class="title"> {{ $product->name }}  </h4>
						<p> {{ $product->short_description }}</p>
						<dl class="dlist-align">
						
						</dl>  <!-- item-property-hor .// -->
						<dl class="dlist-align">
						<dt>Publicacao: </dt>
						<dd>{{ (new DateTime($product->published_at))->format('d  M  Y H:m:s')}}</dd>
						</dl>  <!-- item-property-hor .// -->
					
				</article> <!-- col.// -->
				<aside class="col-sm-3 border-left">
					<div class="action-wrap">
						<div class="price-wrap h4">
							<span class="price"><small><code style="color: black">Preco:</code> <code style="color: green"> <b>${{ $product->price - (($product->price * $product->promotion)/100)  }}</code></b> </span>	
							<del class="price-old" style="color: red"> <code>${{ $product->price }}</code></del></small> 
						</div> <!-- info-price-detail // -->

						@if ($product->subCategory->category->id ==1)
								
							<p>
								<a href="{{ route('comprar',$product->id) }}" class="btn btn-success">
									<i class="fa fa-money-bill-alt"></i>
									Comprar
								</a>
								<a href="{{ route('cart',$product->id) }}" class="btn btn-primary">
									<i class="fa fa-shopping-cart"></i>
		
								</a>
							</p>
							
							<p>
								<a href="{{ route('product_detail',$product->id) }}" class="btn btn-warning">
									<i class="fa fa-eye"></i>
									Detalhes
								</a>
								<a href="{{ route('favorite',$product->id) }}" class="btn btn-danger">
									<i class="fa fa-heart"></i>

								</a>
							</p>
						
							@else
								<p>
							<a href="{{ route('agendar',$product->id) }}" class="btn btn-success">
								<i class="fa fa-clock "></i>
								Agendar
							</a>
						</p>
						<p>
							<a href="{{ route('product_detail',$product->id) }}" class="btn btn-warning">
								<i class="fa fa-eye"></i>
								 Detalhes
							</a>
							<a href="{{ route('favorite',$product->id) }}" class="btn btn-danger">
								<i class="fa fa-heart"></i>
							
							</a>
						</p>
					
							
						@endif
					</div> <!-- action-wrap.// -->
				</aside> <!-- col.// -->
			</div> <!-- row.// -->
			</div> <!-- card-body .// -->
		</article> <!-- card product .// -->
		@endforeach
	</main> <!-- col.// -->
</div>


</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
	<!-- ===================== List of product or services ===================-->
	@foreach($cats as $category)
	<section class="section-content padding-y bg">
	<div class="container">
		<h4 class="title-text">{{$category->name}}</h4>
		<!-- ============== owl slide items  ============= -->
		<div class="owl-carousel owl-init slide-items" data-items="5" data-margin="20" data-dots="true" data-nav="true">
				@foreach($category->products as $product )
					<div class="item-slide">
						<figure class="card card-product">
							<span class="badge-offer"><b> - {{$product->promotion}}%</b></span>
							<div class="img-wrap"> <a href="{{ $product->image }}" data-fancybox="" class="item-gallery"><img src="{{ $product->image }}"></a><a class="btn-overlay" href="{{ route('product_detail', ['product'=>$product->id]) }}"><i class="fa fa-search-plus"></i>Ver Detalhes</a></div>
							<figcaption class="info-wrap text-center">
								<h6 class="title text-truncate"><a href="{{ route('product_detail', ['product'=>$product->id]) }}">{{$product->name}}</a></h6>
								<dl class="dlist-align">
								<dt>Categoria</dt>
								<dd >
									<ol class="breadcrumb  px-3 py-1" style="background:gray; ">
										<li class="breadcrumb-item active" aria-current="page" style="color: rgb(211, 210, 210)"><a href="#" style="color:white">{{ $product->subcategory->category->name }}</a></li>
									</ol>
								</dd>
								</dl> 
							</figcaption>

				


							<div class="bottom-wrap">
								@if ($product->subcategory->category->id == 1)
									
								
								<a href="{{ route('comprar',$product->id) }}" class="btn btn-sm btn-success float-right ">
									<i class="fa fa-money-bill-alt"></i>
									Comprar 
								</a>	
								<a href = "{{ route('cart',$product->id) }}"  class = "btn btn-sm btn-info float-left "><i class = "fa fa-shopping-cart"></i>+ Carrinha</a>
								<br><br>
									@else
									<a href="{{ route('agendar',$product->id) }}" class="btn btn-sm btn-success float-right ">
									<i class="fa fa-clock"></i>
									
									Agendar
								</a>	
								<a href = "{{ route('favorite',$product->id) }}"  class = "btn btn-sm btn-danger float-left "><i class = "fa fa-heart"></i>+ a Favoritos</a>
								<br><br>
								@endif
								<div class="price-wrap h5" style="font-weight:bold; font-size:15px">
									<span class="price-new my-2" style="color: green; ">${{ $product->price - (($product->price * $product->promotion)/100)  }}</span> <del class="price-old float-right " style="color: red">${{$product->price }}</del>
								</div> <!-- price-wrap.// -->

							</div>
							 <!-- bottom-wrap.// -->
						</figure>
						<!-- card // -->
					</div>
				@endforeach
		</div>
		<!-- ============== owl slide items .end // ============= -->
	</div>
	</section>
	@endforeach
	<!-- ===================== List of product or services .end ===================-->

<section class="section-content padding-y bg">
	<div class = "container">	
		<div class="mr-0">
		{{$cats->onEachSide(1)->links()}}
		</div>
	</div>
</section>


<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
