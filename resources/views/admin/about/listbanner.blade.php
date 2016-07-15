@extends('admin.master')
@section('body.content')
<style>
	.btn-danger{
		top: 20px;
		position: relative;
	}
</style>
<!-- List banner -->
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<br>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			@foreach($banners as $index => $banner)
			@if($index==0)
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			@else
				<li data-target="#myCarousel" data-slide-to="{{$index}}"></li>
			@endif
			@endforeach
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
			@foreach($banners as $index => $banner)
				@if($index==0)
				<div class="item active">
					<button id="btnDeleteBanner" class="btn btn-danger btn-circle"> <span class="glyphicon glyphicon-remove"></span></button>
					<img src="{{asset('upload/banners/'.$banner['value'])}}" alt="Chania" width="650" height="550">
				</div>
				@else
				<div class="item">
					<button id="btnDeleteBanner" class="btn btn-danger btn-circle"> <span class="glyphicon glyphicon-remove"></span></button>
					<img src="{{asset('upload/banners/'.$banner['value'])}}" alt="Chania" width="650" height="550">
				</div>
				@endif
			@endforeach
			</div>
		</div>
		<br>
	</div>
</div>

<!--Add banner -->
<div class="row">
	<form name="frmUploadBanner" method="POST" action="{{route('admin.about.uploadBanner')}}" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="col-sm-6 col-sm-offset-3">
			<div>
				@if (count($errors)>0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
			</div>
			<button style="margin-bottom:10px" id="btnAddBanner" type="button" class="btn btn-info btn-circle"><span class="glyphicon glyphicon-plus"></span></button>
			<div class="addfilebannerarea">
				<button name="btnSubmitBanner" type="submit" class="btn btn-success">Submit</button>
			</div>
		</div>
	</form>
</div>
@stop