@extends('adminlte::page')

@section('title', '小米商城后台管理')

@section('content_header')
    <h1>权限管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限添加</font></font></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/rbac/insertDo" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限名称</font></font></label>
                    <input type="text" class="form-control" name="menu_name"  placeholder="Menuname">
                </div>
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标识符</font></font></label>
                    <input type="text" class="form-control" name="uri"  placeholder="Uri">
                </div>
                <div class="form-group">
                  <label>父权限</label>
                  <select class="form-control" name="pid">
                  @foreach($model as $key=>$val)
                    <option value="{{$val['menu_id']}}"><?php $count = substr_count($val['path'],'-'); echo str_repeat('|--',$count); ?>{{$val['menu_name']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>权限类型</label>
                  <select class="form-control" name="is_menu">
                    <option value="0">菜单</option>
                    <option value="1">按钮</option>
                  </select>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button>
            </div>
        </form>
    </div>
@stop
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <!-- script> console.log('Hi!'); </script> -->
@stop