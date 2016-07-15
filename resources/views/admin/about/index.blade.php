@extends('admin.master')
@section('body.content')
<form>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="row" style="padding-top: 100px">
		<div class="col-sm-10">
			<div class="panel panel-info">
				<div class="panel-heading">
					About us
				</div>
				<textarea class="form-control" name="txtAbout" cols="30" rows="10">{{$about->value}}</textarea>
				<script>ckeditor('txtAbout')</script>
				<button id="btnUpdateAbout" type="button" class="btn btn-info">Update</button>
			</div>
		</div>
	</div>
</form>
@stop