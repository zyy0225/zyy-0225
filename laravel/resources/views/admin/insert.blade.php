@extends('adminlte::page')

@section('title', '小米商城后台管理')

@section('content_header')
    <h1>管理员管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员添加</font></font></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/admin/insertDo" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名称</font></font></label>
                    <input type="text" class="form-control" name="username"  placeholder="Username">
                </div>
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电子邮件地址</font></font></label>
                    <input type="email" class="form-control" name="email"  placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">联系方式</font></font></label>
                    <input type="text" class="form-control" name="mobile"  placeholder="Mobile">
                </div>
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">密码</font></font></label>
                    <input type="password" class="form-control" name="password"  placeholder="Password">
                </div>
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认密码</font></font></label>
                    <input type="password" class="form-control" name="repassword"  placeholder="Repassword">
                </div>
                <div class="form-group">
                  <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="is_fweze" value="0">
                      可用
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="is_fweze"  value="1">
                      冻结
                    </label>
                  </div>
                </div>
                @if($model)
                <div class="form-group">
                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">赋予角色</font></font></label>
                @foreach($model as $key=>$val)
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="role_id[]" value="{{$val['role_id']}}">
                      {{$val['role_name']}}
                    </label>
                  </div>
                @endforeach
                </div>
                @endif
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">创建者</font></font></label>
                    <input type="text" class="form-control" name="create_name" value="<?php $name = Session::get('name'); echo $name['username']; ?>" placeholder="Mobile" disabled="">
                    <input type="hidden" class="form-control" name="create_name" value="<?php $name = Session::get('name'); echo $name['username']; ?>">
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