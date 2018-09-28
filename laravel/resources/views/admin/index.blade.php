<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    td{
        padding: 10px;
    }
</style>
<body>
<div class="container">
    <table align="center" valign="midder">
        <tr>
            <td>账户</td>
            <td>姓名</td>
            <td>班级</td>
            <td>操作</td>
        </tr>
        
        @foreach ($model as $val)
        <tr>
            <td>{{$val->tea_account}}</td>
            <td>{{$val->tea_name}}</td>
            <td>{{$val->tea_class}}</td>
            <td><a href="/update?id={{$val->tea_id}}">修改</a> | <a href="/delete?id={{$val->tea_id}}">删除</a></td>
        </tr>
        @endforeach

    </table>
</div>
</body>
</html>