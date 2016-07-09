@extends('admin.master')
@section('body.content')
<div class="col-lg-12">
    <h1 class="page-header">Category
        <small>List</small>
    </h1>
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Category Parent</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr class="odd gradeX" align="center">
            <td>{{$item['id']}}</td>
            <td>{{$item['name']}}</td>
            <td>
            @if($item['parent_id']==0)
                {{"none"}}
            @else
                <?php 
                    $parent=DB::table('cates')
                                ->where('id',$item['parent_id'])
                                ->first(); //Vi chi co 1 phan tu ta se dung first de lay duoi dang object
                                //->get(); //Neu lay theo get() thi se tra ve 1 mang du lieu nhung chi co 1 phan tu -> error
                    echo $parent->name;
                ?>
            @endif
            </td>
            
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('admin.cate.getDelete',$item['id'])}}" onclick="return confirmDelete('Are you sure?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('admin.cate.getEdit',$item['id'])}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop