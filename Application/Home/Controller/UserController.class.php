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
        $user = M('User');
        $data['username'] = 'jerry1';
        $data['email'] = 'jerry1@gmail.com';
        $user->create($data);         //创建数据对象时会触发自动完成数机制
        $record = $user->add();     //add返回的是插入数据库中的ID，对于不存在的表字段，add会自动过滤
        dump($record);

        //读取记录
        $user = M('User');
        $record = $user->where('username="jerry"')->find();
        dump($record);

        //读取字段值
        $user = M('User');
        $record = $user->where('id=99')->getField('username');
        dump($record);

        //返回关联数组
//        $user = M('User');
//        $record = $user->getField('username,email');
//        dump($record);

        //save更新数据
        $user = M('User');
        $data['username'] = 'jerry2';
        $data['email'] = 'jerry2@gmail.com';
        $record = $user->where('id=99')->save($data);   //$record返回是1，表示成功更改
        dump($record);

        $user = M('User');
        $user->username = 'jerry3';
        $user->email = 'jerry3@gmail.com';
        $record = $user->where('id=99')->save();
        dump($record);

        //更新字段
        $user = M('User');
        $data = array('username'=>'jerry4','email'=>'jerry4@gmail.com');
        $record = $user->where('id=99')->setField($data);       //$record = $user->where('id=99')->setField('username','jerry5');
        dump($record);

//        delete删除数据
        $user = M('User');
        $record = $user->where('id=99')->delete();
        $record = $user->delete('1,2,3,5'); //删除主键1,2,3,5记录
        dump($record);

        //自动完成数机制

        $user = D('User');
        $data['username'] = 'jerry6';
        $data['email'] = 'jerry6@gmail.com';
        $user->create($data);       //创建数据对象
        $record = $user->add();
        dump($record);

        $user = D('User');
        $record = $user->find(id);
        dump($record);

        $user = D('User');
        $record = $user->relation(true)->find(4);
        dump($record);

    }

    public function register(){

        $this->display();       //相应的视图文件渲染出来
    }

    public function registerValidate()
    {
        $data['username'] = $_POST['username'];
        $data['email'] = $_POST['email'];

//        $user = D("User");
//
//        if ( !$user->create($data) ) {      //触发自动验证并判断验证是否通过
//            exit($user->getError());
//        }
//        //todo: validation passes, add data to database and redirect somewhere
//
//        echo 'validation passes';

        if ($this->checkVerify($_POST['captcha'])){
            $user = D('User');
            if (!$user->create($data)){
                exit($user->getError());
            }
            $user->add($data);
            echo 'validation passed';
        }else{
            echo 'validation failed';
        }

    }

    //文件上传upload
    public function uploadDemo(){

        $this->display();
    }

    public function uploadFile(){
        $upload = new \Think\Upload();  //实例化上传类

        //指定上传文件大小，文件类型，保存路径
        $upload->maxSize = 3145728;
        $upload->exts = array('jpg','gif','png','jpeg');
        $upload->rootPath = './Uploads/';
        $upload->savePath = '';
        $info = $upload->upload();

        if (!$info){
            $this->error($upload->getError());
        }else{
            foreach ($info as $file) {

                print_r($file);
            }
        }
    }

    //图片处理(裁剪)crop
    public function imageDemo(){

        $image = new \Think\Image();    //支持GD库（默认）和Imageick库

        //如果使用Imageick库(安装 apt-get install -y php5-imageick)
//        $imagegick = new \Think\Image(\Think\Image::IMAGE_IMAGICK);
//        or
//        $imagegick = new \Think\Image('Imageick');

        $image->open('./Uploads/2017-12-14/5a3231f959cc9.png');
        $crop = $image->crop(100,100)->save('./Uploads/2.jpg');

    }

    //生成水印 ./：标识根目录
    public function waterDemo(){
        $image = new \Think\Image();
        $image->open('./Uploads/2017-12-14/5a3231f959cc9.png')->water('./shiyanlou.png')->save('./Uploads/4.jpg');
    }


    //验证码Vertify
    public function verify(){

        $vertify = new \Think\Verify();
        $vertify->entry();

    }

    public function checkVerify($code, $id=''){

        $verify = new \Think\Verify();
        return $verify->check($code,$id);
    }


}
