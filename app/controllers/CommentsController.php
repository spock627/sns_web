<?php
/**
 * Created by PhpStorm.
 * User: Zheng
 * Date: 2015/6/3
 * Time: 14:21
 */
class CommentsController extends BaseController{
    public function getIndex(){
        echo "dfasdf";
    }
    /*
     * 插入评论
     * */
    public function postInsert(){
        $uid=$_POST['uid'];
        $content=$_POST['comment'];
        $mid=$_POST['mid'];
        $time=time();
        $result=DB::insert('insert into comments (mid,uid,content,ctime,mtime) values (?,?,?,?,?)', array($mid,$uid,$content,$time,0));
        if($result){
            $result="success";
        }else{
            $result="error";
        }
        return $result;
    }
    public function getList(){
        $comments=$user = DB::select("select content from comments");
        foreach ($comments as $key => $record) {
            echo $record->content;
        }
    }
}