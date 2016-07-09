@extends('admin.master')
@section('body.content')
<style>
    .itemDiv
    {
        display: block;
    }
    .imgDetail
    {
        width: 100px;
        margin-bottom: 20px;
    }
    .imgCurrent
    {
        display: block;
        width: 150px;
    }
    .iconDel
    {
        top: -50px;
        left: -35px;
        font-size: 30px;
        color: red;
        text-decoration: none;
        position: relative;
    }
    #addFileBtn
    {
        margin-bottom: 20px;
    }
    .inputImage
    {
        margin-bottom: 15px;
    }
</style>
<div class="col-lg-12">
    <h1 class="page-header">Product
        <small>Edit</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<form name="formEdit" action="{{route('admin.product.postEdit',[$product->id])}}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="urlRoot" value="{{url('/')}}">
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
            <label>Category</label>
            <select class="form-control" name="sltCateId">
                 <?php cate_select($cates,0,'---',$product->cate_id); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{$product->name}}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Password" value="{{$product->price}}" />
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" name="txtIntro">
                {{$product->intro}}
            </textarea>
            <script>ckeditor('txtIntro');</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">
                {{$product->content}}
            </textarea>
            <script>ckeditor('txtContent')</script>
        </div>
        <div class="form-group">
            <label>Current image</label>
            <img class="imgCurrent" src="{{asset('upload/'.$product->image)}}">
            <input type="hidden" name="imgCurrentName" value="{{$product->image}}">
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="keywords" placeholder="Please Enter Category Keywords" value="{{$product->keywords}}" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="description">
                {{$product->description}}
            </textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        <label>Detail Images:</label>
        <br>
        @foreach($product_images as $key=>$item)
            <div class="itemDiv" id={{$key}}>
                <img id="{{$item['id']}}" class="imgDetail" src="{{asset('upload/ImgDetail/'.$item['image'])}}">
                <a id="{{$key}}" class="iconDel">&#x2613;</a>
                <!--href="{{route('admin.product.getDeleteDetailImage',$item['id'])}}" -->
            </div>
        @endforeach
        <div class="addFile">
            <button id="addFileBtn" type="button" class="btn btn-success">Add Image</button>
        </div>
        <div class="addArea">
        </div>
    </div>
</form>
@stop