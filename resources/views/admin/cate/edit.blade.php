@extends('admin.master')
@section('body.content')
<div class="col-lg-12">
    <h1 class="page-header">Category
        <small>Edit</small>
    </h1>
</div>
<div class="col-lg-7" style="padding-bottom:120px">
    <form action="{{route('admin.cate.postEdit',$cate['id'])}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input id="idCate" type="hidden" value="{{$cate['id']}}">
        
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
            <label>Category Parent</label>
            <select class="form-control" name="sltParentId">
                <option value="0">Have no category</option>
                <?php
                    cate_select($cate_parent,0,'---',$cate['parent_id'])
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{old('txtCateName',isset($cate) ?  $cate['name']:null)}}" />
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" value="{{old('txtOrder',isset($cate) ?  $cate['order']:null)}}" />
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="keywords" placeholder="Please Enter Category Keywords" value="{{old('keywords',isset($cate) ?  $cate['keywords']:null)}}" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="description">{{old('description',isset($cate) ?  $cate['description']:null)}}
            </textarea>
        </div>
        <button type="submit" class="btn btn-default">Category Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@stop