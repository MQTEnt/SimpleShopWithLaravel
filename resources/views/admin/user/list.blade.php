@extends('admin.master')
@section('body.content')
<div class="col-lg-12">
    <h1 class="page-header">User
        <small>List</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Username</th>
            <th>Level</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr class="odd gradeX" align="center">
            <td>{{$user['id']}}</td>
            <td>{{$user['username']}}</td>
            <td>
                @if($user['level']==1)
                    {{'admin'}}
                @else
                    {{'user'}}
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.user.getDelete',$user['id'])}}" onclick=" return confirmDelete('Do you want to delete this user?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.user.getEdit',$user['id'])}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop