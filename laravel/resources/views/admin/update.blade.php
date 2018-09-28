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
    <h1 align="center">增加老师</h1>
    <hr>
    <form action="/update_do" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$model->tea_id}}">
        <table align="center" valign="midder">
            <tr>
                <td>账号</td>
                <td><input name="tea_account" id="tea_account" type="text"><span id="tea_accounts"></span></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input name="tea_password" id="tea_password"  type="password"><span id="tea_passwords"></span></td>
            </tr>
            <tr>
                <td>名称</td>
                <td><input name="tea_name" id="tea_name" type="text"><span id="tea_names"></span></td>
            </tr>
            <tr>
                <td>班级号</td>
                <td><input name="tea_class" id="tea_class" type="text"><span id="tea_classs"></span></td>
            </tr>
            <tr>
                <td>状态</td>
                <td><select style="width: 173px;height: 25px;" name="tea_status" id="tea_status">
                    <option value="0">可用</option>
                    <option value="1">冻结</option>
                </select><span id="tea_statuss"></span></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align:center;"><input style="width: 120px;" type="submit" value="提交"></td>
            </tr>
        </table>
    </form>
</body>
</html>