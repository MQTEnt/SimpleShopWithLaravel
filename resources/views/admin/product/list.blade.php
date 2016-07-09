@extends('admin.master')
@section('body.content')
<div class="col-lg-12">
    <h1 class="page-header">Product
        <small>List</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Cate</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
       @foreach($products as $product)
        <tr class="odd gradeX" align="center">
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{number_format($product->price,0,",",".")}} VND</td>
            <td>
                {{\Carbon\Carbon::createFromTimeStamp(strtotime($product->create_at))->diffForHumans()}} 
            </td>
            <td>{{$cate=DB::table('cates')->where('id','=',$product->cate_id)->first()->name}}</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.product.getDelete',[$product->id])}}" onclick="return confirmDelete('Do you want to delete this product?');"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.product.getEdit',[$product->id])}}">Edit</a></td>
        </tr>
       @endforeach
    </tbody>
</table>
@stop