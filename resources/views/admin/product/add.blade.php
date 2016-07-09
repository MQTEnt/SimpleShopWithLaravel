@extends('admin.master')
@section('body.content')
<div class="col-lg-12">
    <h1 class="page-header">Product
        <small>Add</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<form action="{{route('admin.product.postAdd')}}" method="POST" enctype="multipart/form-data">
    <div class="col-lg-7" style="padding-bottom:120px">
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
                <label>Category</label>
                <select class="form-control" name="sltCateId">
                   <?php cate_select($cate_id); ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" placeholder="Please Enter Name" value="{{old('txtName')}}" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{old('txtPrice')}}" />
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control" rows="3" name="txtIntro">{{old('txtIntro')}}</textarea>
                <script>ckeditor('txtIntro');</script>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" rows="3" name="txtContent">{{old('txtContent')}}</textarea>
                <script>ckeditor('txtContent');</script>
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{{old('txtKeywords')}}" />
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Product Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class="col-lg-1"></div>
    <!-- Noi chua button up image detail -->
    <div class="col-lg-4">
        <div class="form-group"></div>
        <div class="list-group">
            <p class="list-group-item active">
                List image detail product
            </p>
            @for($i=0; $i<3; $i++)
                <input type="file" name="imageDetailProduct[]">
            @endfor
        </div>
    </div>
 </form>
@stop