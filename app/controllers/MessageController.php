<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/3/29
 * Time: 17:10
 */

class MessageController extends BaseController{

    /*
     * 显示消息列表
     * */
    public function getIndex()
    {
        return View::make('contents.message');
    }
    /*
     * 插入消息记录
     * */
    public function postInsert()
    {
        $input = Input::all();
        $uid= $input["uid"];
        $content= $input["content"];
        $result=DB::insert('insert into message (uid,content) values (?,?)', array($uid,$content));
        if($result){
            $result="success";
        }else{
            $result="error";
        }
        return $content;
    }
}