@extends('layouts.frontendLayout')

@section('content')

<section class="section-pagetop bg-secondary">
<div class="container clearfix">
	<h2 class="title-page">Pagina</h2>

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
<div class="owl-init slider-main owl-carousel" data-items="1" data-dots="false" data-nav="true">
	<div class="item-slide">
		<img src="images/banners/slide1.jpg">
	</div>
	<div class="item-slide rounded">
		<img src="images/banners/slide2.jpg">
	</div>
	<div class="item-slide rounded">
		<img src="images/banners/slide3.jpg">
	</div>
</div>
<!-- ============== main slidesow .end // ============= -->

	</div> <!-- col.// -->
	<aside class="col-md-4">
		@foreach ($categories->random(3) as $category )
			<div class="card mb-3">
			<figure class="itemside">
				<div class="aside"><div class="img-wrap border-right"><img src="images/items/1.jpg"></div></div>
				<figcaption class="text-wrap align-self-center">
					<h6 class="title">{{ $category->name }}</h6>
					<dl class="dlist-align">
						<dt>Categoria</dt>
						<dd >
							<ol class="breadcrumb  px-3 py-1" style="background:gray; ">
								<li class="breadcrumb-item active" aria-current="page" style="color: rgb(211, 210, 210)"><a href="#" style="color:white">{{ $category->category->name }}</a></li>
							</ol>
						</dd>
						</dl> 
						 <!-- item-property-hor .// -->
						 <a href="#">
							<li class="list-unstyled active_category">
								Ver mais Itens
							</li>
						</a>
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
					<a href="#">
						<li  class="active_category">Todas<span class="float-right badge badge-light round">
									{{ App\Product::count() }}
							</span>
						</li>
					</a>
					@foreach (App\Category::all() as  $category)
					<a href="#">
						<li>{{ $category->name}} <span class="float-right badge badge-light round">
								{{ App\Product::whereIn('sub_category_id',App\SubCategory::where('category_id',$category->id)->get('id'))->count() }}
							</span>
						</li>
					 </a>
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
			<div class="card-body">
				<div class="form-row">
				<div class="form-group col-md-6">
				  <label>Mínimo</label>
				  <input class="form-control" placeholder="$0" type="number">
				</div>
				<div class="form-group text-right col-md-6">
				  <label>Maximo</label>
				  <input class="form-control" placeholder="$1,0000" type="number">
				</div>
				</div> <!-- form-row.// -->
			</div> <!-- card-body.// -->
			<button class="btn btn-block btn-outline-primary">Filtrar</button>
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->
	<article class="card-group-item">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse44">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">Por tags</h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse44">
			<div class="card-body">
			<form>
				@foreach (\App\Tag::all()->random(5) as $tag )
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">{{ $tag->products->count() }} </span>
					 {{ $tag->name }}
				  </span>
				</label>  <!-- form-check.// -->
				@endforeach
			</form>
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
		<button class="btn btn-block btn-outline-primary">Filtrar</button>
	</article> <!-- card-group-item.// -->
</div> <!-- card.// -->


	</aside> <!-- col.// -->
	<main class="col-sm-9">
		@foreach ($categories->first()->products->slice(0,3) as $product )
			<article class="card card-product">
			<div class="card-body">
			<div class="row">
				<aside class="col-sm-3">
					<div class="img-wrap"><img src="images/items/2.jpg"></div>
				</aside> <!-- col.// -->
				<article class="col-sm-6">
						<h4 class="title"> {{ $product->name }}  </h4>
						<p> {{ $product->short_description }}</p>
						<dl class="dlist-align">
						<dt>Categoria</dt>
						<dd >
							<ol class="breadcrumb  px-3 py-1" style="background:gray; ">
								<li class="breadcrumb-item"><a href="#" style="color:white">{{ $product->subCategory->category->name }}</a></li>
								<li class="breadcrumb-item active" aria-current="page" style="color: rgb(211, 210, 210)">{{ $product->subCategory->name }}</li>
							</ol>
						</dd>
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
								<a href="#" class="btn btn-success">
									<i class="fa fa-money-bill-alt"></i>
									Comprar agora
								</a>
							</p>
							<p>
								<a href="#" class="btn btn-primary">
									<i class="fa fa-shopping-cart"></i>
									+ a Carrinha
								</a>
							</p>
							<p>
								<a href="{{ route('product_detail',$product->id) }}" class="btn btn-warning">
									<i class="fa fa-eye"></i>
									Ver detalhes
								</a>
							</p>
							<p>
								<a href="#" class="btn btn-danger">
									<i class="fa fa-heart"></i>
									+ a Favoritos
								</a>
							</p>
							@else
								<p>
							<a href="#" class="btn btn-success">
								<i class="fa fa-clock "></i>
								Agendar agora
							</a>
						</p>
						<p>
							<a href="{{ route('product_detail',$product->id) }}" class="btn btn-warning">
								<i class="fa fa-eye"></i>
								 Ver detalhes
							</a>
						</p>
						<p>
							<a href="#" class="btn btn-danger">
								<i class="fa fa-heart"></i>
								+ a Favoritos
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
							<div class="img-wrap"> <a href="{{ asset('/') }}images/items/1.jpg" data-fancybox="" class="item-gallery"><img src=" {{ asset('/') }}images/items/1.jpg"></a><a class="btn-overlay" href="{{ route('product_detail', ['product'=>$product->id]) }}"><i class="fa fa-search-plus"></i>Ver Detalhes</a></div>
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
