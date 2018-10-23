@extends('adminlte::page')

@section('title', '小米商城后台管理')

@section('content_header')
    <h1>权限管理</h1>
@stop

@section('content')
  <div class="box">
      <div class="box-header">
        <h3 class="box-title">权限列表</h3>
        <a href="/rbac/insert" class='label label-primary' style='margin-left:20px'>添加</a>
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
            <th>权限名称</th>
            <th>类型</th>
            <th>标识符</th>
            <th>父ID</th>
            <th>操作</th>
          </tr>

          @foreach($menu as $key=>$val)
          <tr>
            <td>{{$val->menu_id}}</td>
            <td><?php $count = substr_count($val->path,'-'); echo str_repeat('|--',$count); ?>{{$val->menu_name}}</td>
            <td><?php if($val->is_menu == 0){
                echo "菜单";
            }else{
                echo "按钮";
            } ?></td>
            <td>{{$val->uri}}</td>
            <th><?php
                foreach($menu as $k=>$v){
                    if($val->pid == $v->menu_id){
                        echo $v->menu_name;
                    }
                }
            ?></th>
            <td><a href="/rbac/update?menu_id={{$val->menu_id}}" class='label label-primary'>修改</a> 
            | <a href="/rbac/delete?menu_id={{$val->menu_id}}" class='label label-danger'>删除</a>
            </td>
          </tr>
          @endforeach

        </table>
        <p style="text-align:center">{{ $menu->links() }}</p>
    </div>
  </div>
@stop
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <!-- script> console.log('Hi!'); </script> -->
@stop