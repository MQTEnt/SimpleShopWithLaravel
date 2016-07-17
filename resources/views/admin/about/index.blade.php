@extends('admin.master')
@section('body.content')
<form>
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="row" style="padding-top: 100px">
		<div class="col-sm-10">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>About us</h4>
				</div>
				<textarea class="form-control" name="txtAbout" cols="30" rows="10">{{$about->value}}</textarea>
				<script>ckeditor('txtAbout')</script>
				<button id="btnUpdateAbout" type="button" class="btn btn-info">Update</button>
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom: 100px;">
		<div class="col-sm-6">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>Contact</h4>
				</div>
				<div class="panel-body">
					<div class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">Facebook:</label>
							<div class="col-sm-10">
								<input type="text" name="txtFacebook" class="form-control" value="{{$facebook->value}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Twitter:</label>
							<div class="col-sm-10">
								<input type="text" name="txtTwitter" class="form-control" value="{{$twitter->value}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Email:</label>
							<div class="col-sm-10">
								<input type="text" name="txtEmail" class="form-control" value="{{$email->value}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Phone:</label>
							<div class="col-sm-10">
								<input type="text" name="txtPhone" class="form-control" value="{{$phone->value}}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="button" id="btnUpdateContact" class="btn btn-info" href="{{route('admin.about.updateContact')}}">Update</button>
							</div>
						</div>
						<!-- Add new contact 
						<div class="form-group">
							<label class="col-sm-2 control-label">Select type:</label>
							<div class="col-sm-3">
							<select name="sltExtraType[]" class="form-control" id="sel1">
								<option>Phone</option>
								<option>Email</option>
								<option>Social Network</option>
							</select>
							</div>
							<label class="col-sm-1 control-label">Name:</label>
							<div class="col-sm-6">
								<input name="txtExtraName[]" type="text" class="form-control" placeholder="eg: Facebook, Gmail, Phone Mr.Tran">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Value:</label>
							<div class="col-sm-10">
								<input name="txtExtraValue[]" type="text" class="form-control" placeholder="facebook.com/user, user@gmail.com, +84 123456789">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button style="margin-bottom:10px" id="btnAddContact" type="button" class="btn btn-success btn-circle"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
						</div>
						-->
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@stop