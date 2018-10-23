@extends('adminlte::page')

@section('title', '小米商城后台管理')

@section('content_header')
    <h1>角色管理</h1>
@stop

@section('content')
  <div class="box">
      <div class="box-header">
        <h3 class="box-title">角色列表</h3>
        <a href="/role/insert" class='label label-primary' style='margin-left:20px'>添加</a>
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
            <th>角色名称</th>
            <th>操作</th>
          </tr>

          @foreach($model as $key=>$val)
          <tr>
            <td>{{$val->role_id}}</td>
            <td>{{$val->role_name}}</td>
            <td><a href=""  class='label label-warning'>查看权限</a> | <a href="/role/update?role_id={{$val->role_id}}" class='label label-primary'>修改</a> 
            | <a href="/role/delete?role_id={{$val->role_id}}" class='label label-danger'>删除</a>
            </td>
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