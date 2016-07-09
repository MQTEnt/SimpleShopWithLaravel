@extends('user.master')
@section('title')
  Home page
@stop
@section('body.main')
<!-- Featured Product-->
<section id="featured" class="row mt40">
  <div class="container">
    <h1 class="heading1"><span class="maintext">Featured Products</span><span class="subtext"> See Our Most featured Products</span></h1>
    <ul class="thumbnails">
    @foreach($products as $product)
      <li class="span3">
        <a class="prdocutname" href="{{route('home.product',[$product->id,$product->alias])}}">{{$product->name}}</a>
        <div class="thumbnail">
          <span class="sale tooltip-test">Sale</span>
          <a href="{{route('home.product',[$product->id, $product->alias])}}"><img alt="" src="{{asset('upload/'.$product->image)}}"></a>
          <div class="pricetag">
            <span class="spiral"></span><a href="{{route('home.getBuy',$product->id)}}" class="productcart">ADD TO CART</a>
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
  </div>
</section>

<!-- Latest Product-->
<section id="latest" class="row">
  <!-- Same Feature Product -->
</section>
@stop