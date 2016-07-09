@extends('admin.master')
@section('body.content')
<div class="col-lg-12">
    <h1 class="page-header">User
        <small>Edit</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{{route('admin.user.postEdit',$user->id)}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        </div>
        <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="txtUserName" value="{{$user->username}}" disabled />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="txtPass" placeholder="Enter new password if you want to change" value="" />
        </div>
        <div class="form-group">
            <label>RePassword</label>
            <input type="password" class="form-control" name="txtRePass" placeholder="Please enter re-password" value="" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{{$user->email}}" />
        </div>
        <div class="form-group">
            <label>User Level</label>
            <label class="radio-inline">
                <input name="rdoLevel" value="1" type="radio" 
                    @if($user->level==1)
                        {{'checked="checked"'}}
                    @endif
                >
                Admin
            </label>
        @if(Auth::user()->id!=$id)
            <label class="radio-inline">
                <input name="rdoLevel" value="2" type="radio"
                    @if($user->level==2)
                        {{'checked="checked"'}}
                    @endif
                >
                Member
            </label>
        @endif
        </div>
        <button type="submit" class="btn btn-default">User Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@stop