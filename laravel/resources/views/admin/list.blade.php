@extends('adminlte::page')

@section('title', '小米商城后台管理')

@section('content_header')
    <h1>管理员管理</h1>
@stop

@section('content')
  <div class="box">
      <div class="box-header">
        <h3 class="box-title">管理员列表</h3>
        <a href="/admin/insert" class='label label-primary' style='margin-left:20px'>添加</a>
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
            <th>管理员名称</th>
            <th>邮箱</th>
            <th>联系方式</th>
            <th>管理员级别</th>
            <th>状态</th>
            <th>操作</th>
          </tr>

          @foreach($model as $key=>$val)
          <tr>
            <td>{{$val->user_id}}</td>
            <td>{{$val->username}}</td>
            <td>{{$val->email}}</td>
            <td>{{$val->mobile}}</td>
            <td><?php if($val->is_supor == 0){
                echo "<span class='label label-warning'>超级管理员</span>";
            }else if($val->is_supor == 1){
              echo "<span class='label label-primary'>普通管理员</span>";
            } ?></td>
            <td><?php if($val->is_fweze == 0){
                  echo "<span class='label label-primary'>可用</span>";
            }else if($val->is_fweze == 1){
                echo "<span class='label label-danger'>冻结</span>";
            } ?></td>
            <td><a href="/admin/update?user_id={{$val->user_id}}" class='label label-primary'>修改</a> 
            @if($val->is_supor == 1)
            | <a href="/admin/delete?user_id={{$val->user_id}}" class='label label-danger'>删除</a>
            @endif</td>
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