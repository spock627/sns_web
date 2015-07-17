<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/6/3
 * Time: 16:28
 */
class User{
    public function getUserNameById($id){
        $name= DB::table('users')->select('name')->where('id', '=',$id)->get();
        return $name;
    }
}