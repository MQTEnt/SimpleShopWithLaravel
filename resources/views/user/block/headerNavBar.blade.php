<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu">
      <!-- Home tab -->
      <li><a class="active"  href="{{url('/home')}}">Home</a></li>
      <!-- Tab Cate -->
      <?php
        //Chon nhung Cate khong la con cua Cate nao -> parent_id = 0
        $cateLevel1=DB::table('cates')->where('parent_id',0)->get();
      ?>
      @foreach($cateLevel1 as $item)
       <li><a href="#">{{$item->name}}</a>
        <div>
          <ul>
            <?php
              //Chon nhung Cate la con cua Cate Level 1
              $cateLevel2=DB::table('cates')->where('parent_id',$item->id)->get();
            ?>
            @foreach($cateLevel2 as $item2)
            <li><a href="{{route('home.cate',[$item2->id,$item2->alias])}}">{{$item2->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </li>
      @endforeach
    </ul>
  </nav>
</div>