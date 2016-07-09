@extends('user.master')
@section('title')
Contact page
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
    <li class="active">Contact</li>
  </ul>  
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

    <!-- Sidebar Start-->
    <div class="span3">
      <aside>
        <div class="sidewidt">
          <h2 class="heading2"><span>Contact Info</span></h2>
          <p> Lorem Ipsum is simply<br>
            Lorem Ipsum is simply<br>
            Lorem Ipsum is simply<br>
            <br>
            Phone: (012) 333-7890<br>
            Fax: (123) 444-7890<br>
            Email: test@contactus.com<br>
            Web: yourcompanyname.com<br>
          </p>
        </div>
      </aside>
    </div>
    <!-- Sidebar End-->

  </div>
</div>
</section>
@stop