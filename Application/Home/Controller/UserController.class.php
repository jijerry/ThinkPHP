<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/12
 * Time: 19:46
 */

namespace Home\Controller;

use Think\Controller;

class UserController extends Controller{

    public function addUser(){

        echo 'add user done';
    }

    public function testDemo(){

        //添加记录
//        $user = M('User');
//        $data['username'] = 'jerry1';
//        $data['email'] = 'jerry1@gmail.com';
//        $user->create($data);
//        $record = $user->add();     //add返回的是插入数据库中的ID，对于不存在的表字段，add会自动过滤
//        dump($record);

        //读取记录
//        $user = M('User');
//        $record = $user->where('username="jerry"')->find();
//        dump($record);

        //读取字段值
//        $user = M('User');
//        $record = $user->where('id=99')->getField('username');
//        dump($record);

        //返回关联数组
//        $user = M('User');
//        $record = $user->getField('username,email');
//        dump($record);

        //save更新数据
//        $user = M('User');
//        $data['username'] = 'jerry2';
//        $data['email'] = 'jerry2@gmail.com';
//        $record = $user->where('id=99')->save($data);   //$record返回是1，表示成功更改
//        dump($record);

//        $user = M('User');
//        $user->username = 'jerry3';
//        $user->email = 'jerry3@gmail.com';
//        $record = $user->where('id=99')->save();
//        dump($record);

        //更新字段
//        $user = M('User');
//        $data = array('username'=>'jerry4','email'=>'jerry4@gmail.com');
//        $record = $user->where('id=99')->setField($data);       //$record = $user->where('id=99')->setField('username','jerry5');
//        dump($record);

        //delete删除数据
//        $user = M('User');
//        $record = $user->where('id=99')->delete();
//        $record = $user->delete('1,2,3,5'); //删除主键1,2,3,5记录
//        dump($record);


    }
}
