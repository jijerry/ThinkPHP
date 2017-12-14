<?php
/*
 * 采用驼峰命名，注意首字母大写
 */

//使用相同的命名空间，Home代表Home模块
namespace Home\Controller;

//加载
use Think\Controller;

//新建控制器
class IndexController extends Controller {

    public function index1(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function read($id=0){

        echo "read page with ".$id;
    }

    public function archive($year,$month){

        echo "$year".$month;
    }


    //前置和后置操作
    public function _before_top(){
        echo "before top page";
    }

    public function top(){
        echo "top page";
    }

    public function _after_top(){
        echo "after top page";
    }


    //跳转
    public function user(){

        $User = M('User');
        $data['username'] = 'Think';
        $data['email'] = 'Think@gmail.com';
        $result =$User->add($data);

        if (!$result){

            $this->success('success','Home/User/addUser');
        }else{
            $this->error('failed','Home/Article/error',10);
        }
    }

    //重定向

    /**
     * 控制器的redirect方法和redirect函数区别
     * 前者使用URL规则定义跳转地址
     * 后者是一个URL地址
     */
    public function redirectToArticle(){

        $this->redirect('/Home/Article/show',array('id'=>2),3,'Redirecting...');    //重定向到模块中的方法
        $this->redirect('/Home/Article/show/id/3','redirecting...',3);  //重定向指定URL地址
    }

    public function index(){

        $user = D('User');

        $userInfo = $user->find(101);

        $this->assign('user',$userInfo);    //'user'传递给视图的变量名

        $this->display();   //自动寻找在这个控制器之下的具体操作的视图（方法名一样的视图文件）
        $this->theme('blue')->display('Index:edit');    //调用blue主题下面的Index控制器的edit视图文件

    }


}