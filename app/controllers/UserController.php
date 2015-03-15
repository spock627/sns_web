<?php
/**
 * Created by Zheng.
 * User: Administrator
 * Date: 2015/3/15
 * Time: 13:13
 */

class UserController extends BaseController {

    public function postUpdate(){
        $input = Input::all();
        var_dump($input);
    }
}