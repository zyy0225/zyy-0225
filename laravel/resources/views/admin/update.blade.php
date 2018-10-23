@extends('adminlte::page')

@section('title', '小米商城后台管理')

@section('content_header')
    <h1>管理员管理</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员修改</font></font></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="/admin/updateDo" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user_id" value="{{$model['user_id']}}">
            <input type="hidden" name="pwd" value="{{$model['password']}}">
            <div class="box-body">
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员名称</font></font></label>
                    <input type="text" class="form-control" name="username" value="{{$model['username']}}" placeholder="Username">
                </div>
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">电子邮件地址</font></font></label>
                    <input type="email" class="form-control" name="email" value="{{$model['email']}}" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">联系方式</font></font></label>
                    <input type="text" class="form-control" name="mobile" value="{{$model['mobile']}}" placeholder="Mobile">
                </div>
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">密码</font></font></label>
                    <input type="password" class="form-control" name="password" value="{{$model['password']}}" placeholder="Password">
                </div>
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认密码</font></font></label>
                    <input type="password" class="form-control" name="repassword" value="{{$model['password']}}"  placeholder="Repassword">
                </div>
                @if($model['is_supor'] == 1)
                <div class="form-group">
                  <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font></label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="is_fweze" value="0" <?php if($model['is_fweze'] == 0){ echo "checked=''";}?>>
                      可用
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="is_fweze"  value="1" <?php if($model['is_fweze'] == 1){ echo "checked=''";}?>>
                      冻结
                    </label>
                  </div>
                </div>
                @endif
                <div class="form-group">
                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">赋予角色</font></font></label>
                @foreach($role as $key=>$val)
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="role_id[]" value="{{$val['role_id']}}" @foreach($adminRole as $v)
                          @if($val['role_id'] == $v['role_id'] && $model['is_supor'] == 0)
                            checked='' disabled=''
                          @elseif($val['role_id'] == $v['role_id'])
                            checked=''
                          @endif
                      @endforeach
                      >
                      {{$val['role_name']}}
                    </label>
                  </div>
                @endforeach
                </div>
                @if($model['is_supor'] == 1)
                <div class="form-group">
                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">创建者</font></font></label>
                    <input type="text" class="form-control" name="create_name" value="<?php $name = Session::get('name'); echo $name['username']; ?>" placeholder="Mobile" disabled="">
                </div>
                @endif
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