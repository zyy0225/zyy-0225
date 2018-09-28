<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Admin\Rouote;

class IndexController extends Controller
{
    /**
     *展示页面 
    */
    public function index()
    {
        $data = Db::table("teacher")->get();
        return view('admin.index',['model'=>$data]);
    }

    /**
    *删除
    */
    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        // var_dump($id);die;
        $data = Db::table("teacher")->where('tea_id',$id)->delete();
        if($data){
            Route::get('index', 'IndexController@index');
            // Route::get('index', function () {
            //     return redirect('Index/index');
            // });
            // return redirect('index')->action('IndexController@index');
        }
    }

    /**
    *修改页面 
    */
    public function update()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $data = Db::table("teacher")->where('tea_id',$id)->first();
        return view('admin/update',['model'=>$data]);
    }

    /**
    *修改 
    */
    public function update_do()
    {
        $post = isset($_POST) ? $_POST : '';
        if($post){
            $info = $post;
            unset($info['_token']);
            unset($info['id']);
            // var_dump($info);die;
            $data = Db::table("teacher")->where('tea_id',$post['id'])->update($info);
            if($data){
                Rouote::redirect('/update_do','index');
            }
            // var_dump($post);
        }
    }


}