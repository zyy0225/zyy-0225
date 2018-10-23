@extends('adminlte::page')

@section('title', '小米商城后台管理')

@section('content_header')
    <h1>后台商品详情</h1>
@stop

@section('content')
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Goods List</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr >
            <th>ID</th>
            <th>商品名称</th>
            <th>图片展示</th>
            <th>商品简介</th>
            <th>价格</th>
            <th>是否上架</th>
            <th>上架时间</th>
            <th>库存</th>
            <th>所属分类</th>
            <th>操作</th>
          </tr>

          @foreach($model as $key=>$val)
          <tr>
            <td>{{$val->goods_id}}</td>
            <td>{{$val->goods_name}}</td>
            <td><img src="/miui/image/{{$val->goods_img}}" width="50px" height="50px"></td>
            <td><p style="width:200px;overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{$val->goods_brief}}</p></td>
            <td>{{$val->market_price}}</td>
            <td><?php if($val->is_on_sale == 0){
                echo "<span class='label label-primary'>在售</span>";
            }else{
              echo "<span class='label label-danger'>下线</span>";
            } ?></td>
            <td><?php echo date('Y-m-d',$val->add_time);?></td>
            <td><span class="label label-success">{{$val->goods_number}}</span></td>
            <td><?php foreach($cate as $k=>$v){
                if($val->cat_id == $v['cat_id']){
                  echo "<span class='label label-warning'>" . $v['cat_name'] . "</span>";
              }
            } ?></td>
            <td><a href="">修改</a> | <a href="">删除</a></td>
          </tr>
          @endforeach

        </table>
        <p style="text-align:center">{{ $model->links() }}</p>
    </div>
  </div>
@stop
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <!-- script> console.log('Hi!'); </script> -->
@stop
