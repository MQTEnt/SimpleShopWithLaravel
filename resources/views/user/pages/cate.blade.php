@extends('user.master')
@section('title')
Category
@stop
@section('body.main')
<section id="product">
	<div class="container">
		<!--  breadcrumb -->  
		<ul class="breadcrumb">
			<li>
				<a href="#">Home</a>
				<span class="divider">/</span>
			</li>
			<li class="active">Category</li>
		</ul>
		<div class="row">        
			<!-- Sidebar Start-->
			<aside class="span3">
				<!-- List cate have same parent cate-->  
				<div class="sidewidt">
					<h2 class="heading2"><span>Categories</span></h2>
					<ul class="nav nav-list categories">
					@foreach($cates as $cate)
						<li>
							<a href="{{route('home.cate',[$cate->id, $cate->alias])}}">{{$cate->name}}</a>
						</li>
					@endforeach
					</ul>
				</div>
				<!--  Best Seller -->  
				<div class="sidewidt">
					<h2 class="heading2"><span>Best Seller</span></h2>
					<ul class="bestseller">
						<li>
							<img width="50" height="50" src="{{asset('user/img/prodcut-40x40.jpg')}}" alt="product" title="product">
							<a class="productname" href="product.html"> Product Name</a>
							<span class="procategory">Women Accessories</span>
							<span class="price">$250</span>
						</li>
						<li>
							<img width="50" height="50" src="{{asset('user/img/prodcut-40x40.jpg')}}" alt="product" title="product">
							<a class="productname" href="product.html"> Product Name</a>
							<span class="procategory">Electronics</span>
							<span class="price">$250</span>
						</li>
						<li>
							<img width="50" height="50" src="{{asset('user/img/prodcut-40x40.jpg')}}" alt="product" title="product">
							<a class="productname" href="product.html"> Product Name</a>
							<span class="procategory">Electronics</span>
							<span class="price">$250</span>
						</li>
					</ul>
				</div>
				<!-- Latest Product -->  
				<div class="sidewidt">
					<h2 class="heading2"><span>Latest Products</span></h2>
					<ul class="bestseller">
					@foreach($lastestProducts as $product)
						<li>
							<img width="50" height="50" src="{{asset('upload/'.$product->image)}}" alt="product" title="product">
							<a class="productname" href="{{route('home.product',[$product->id,$product->alias])}}">{{$product->name}}</a>
							<span class="procategory">{{$currentCate->name}}</span>
							<span class="price">$ {{$product->price}}</span>
						</li>
					@endforeach
					</ul>
				</div>
				<!--  
				Must have 
				<div class="sidewidt">
					<h2 class="heading2"><span>Must have</span></h2>
					<div class="flexslider" id="mainslider">
						<ul class="slides">
							<li>
							<img src="{{asset('user/img/product1.jpg')}}" alt="" />
							</li>
							<li>
							<img src="{{asset('user/img/product2.jpg')}}" alt="" />
							</li>
						</ul>
					</div>
				</div>
				-->
			</aside>
			<!-- Sidebar End-->
			<!-- Category-->
			<div class="span9">          
				<!-- Category Products-->
				<section id="category">
					<div class="row">
						<div class="span9">
							<!--Trang chinh Category-->
							<section id="categorygrid">
								<ul class="thumbnails grid">
								@foreach($products as $product)
									<li class="span3">
										<a class="prdocutname" href="{{route('home.product',[$product->id,$product->alias])}}">{{$product->name}}</a>
										<div class="thumbnail">
											<span class="sale tooltip-test">Sale</span>
											<a href="{{route('home.product',[$product->id,$product->alias])}}"><img alt="" src="{{asset('upload/'.$product->image)}}"></a>
											<div class="pricetag">
												<span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
												<div class="price">
													<div class="pricenew">${{$product->price}}</div>
													<!--Old price -->
													<!--<div class="priceold">$5000.00</div>-->
												</div>
											</div>
										</div>
									</li>
								@endforeach
								</ul>
								<div class="pagination pull-right">
									<!-- Phan trang Laravel -->
									{!! $products->render() !!}
								</div>
							</section>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
@stop