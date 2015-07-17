<?php
require app_path().'/config/appconfig.php';
/**
 * Created by PhpStorm.
 * User: Zheng
 * Date: 2015/3/29
 * Time: 17:10
 */
class MessageController extends BaseController{

    /*
     * 显示消息列表
     * */
    public function getIndex(){
        return View::make('contents.message');
    }
    /*
     * 插入消息记录
     * */
    public function postInsert(){
        $input = Input::all();
        $uid= $input["uid"];
        $content= $input["content"];
        $time=time();
        $result=null;
        $id = DB::table('messages')->insertGetId(
            array('uid' => $uid, 'content' =>$content,'ctime' =>$time,'mtime' => 0,)
        );
        if($id){
            $result=$id;
        }else{
            $result="error";
        }
        return $result;
    }
    /*
     * 获取消息记录
     * */
    public function getRecord(){
        $result=DB::select('select mid,uid,content from messages');
        foreach($result as $list=>$record){
            echo $record->mid." ";
            echo $record->uid." ";
            echo $record->content."<br/>";
        }
       // return $result;
    }
    /*
     * 获取当前页的消息内容（post），每页显示5条
     * */
    public function postCurrentpage(){
        $result = DB::table('messages')->paginate(PAGESIZE);
        $message=array();
        foreach ($result as $key => $record) {
            $message[$key]=$record;
        }
        return json_encode($message);
    }
    /*
     * 获取当前页的消息内容（get）
     * */
    public function getCurrentpage(){
        $result = DB::table('messages')->paginate(PAGESIZE);
        $message=array();
        foreach ($result as $key => $record) {
            $message[$key]=$record;
        }
        return json_encode($message);
    }
}