@extends('user.master')
@section('title')
Contact page
@stop
@section('body.main')
<!-- Facebook comment -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- End Facebook comment -->

<section>
  <div class="container">
    <!-- Contact Us-->
    <h1 class="heading1"><span class="maintext">Contact</span><span class="subtext"> Contact Us for more</span></h1>
    <div class="row">
      <div class="span9">
        <form class="form-horizontal" action="{{route('home.postContact')}}" method="post">
          <fieldset>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="control-group">
              <label for="name" class="control-label">Name <span class="required">*</span></label>
              <div class="controls">
                <input type="text"  class="required" value="" name="txtName">
              </div>
            </div>
            <div class="control-group">
              <label for="message" class="control-label">Message</label>
              <div class="controls">
                <textarea  class="required" rows="6" cols="40" name="txtMessage"></textarea>
              </div>
            </div>
            <div class="form-actions">
              <input class="btn btn-orange" type="submit" value="Submit" id="submit_id">
              <input class="btn" type="reset" value="Reset">
            </div>
          </fieldset>
        </form>
      </div>
    <!-- Row Facebook comment -->
    <div class="row" style="padding-left: 50px;">
      <div class="fb-comments" data-href="http://localhost:8000/mylinkforfacebookcommentplugin" data-numposts="5">
      </div>
    </div>
    <!-- End row Facebook comment -->
  </div>
</section>
@stop