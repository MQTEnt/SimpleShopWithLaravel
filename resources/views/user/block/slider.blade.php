<section class="slider">
  <div class="container">
    <div class="flexslider" id="mainslider">
      <ul class="slides">
      @foreach($banners as $banner)
        <li>
          <img src="{{asset('upload/banners/'.$banner->value)}}" alt="" />
        </li>
      @endforeach
      </ul>
    </div>
  </div>
</section>