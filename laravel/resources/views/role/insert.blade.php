@extends('adminlte::page')

@section('title', '小米商城后台管理')

@section('content_header')
    <h1>角色管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色添加</font></font></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/role/insertDo" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">角色名称</font></font></label>
                    <input type="text" class="form-control" name="role_name"  placeholder="Rolename">
                </div>
                <div class="form-group">
                  <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">菜单权限</font></font></label>
                  <div class="checkbox">
                    @foreach($menu as $key=>$val)
                    <label>
                      <input type="checkbox" name="menu_id[]" value="{{$val['menu_id']}}">
                      <?php $count = substr_count($val['path'],'-'); echo str_repeat('|--',$count); ?>
                      {{$val['menu_name']}}
                    </label>
                    @endforeach
                  </div>
                </div>
                <div class="form-group">
                  <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">按钮权限</font></font></label>
                  <div class="checkbox">
                    @foreach($button as $key=>$val)
                    <label>
                      <input type="checkbox" name="button_id[]" value="{{$val['button_id']}}">
                      {{$val['button_name']}}
                    </label>
                    @endforeach
                  </div>
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