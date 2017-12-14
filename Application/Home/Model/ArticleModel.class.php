<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/13
 * Time: 16:36
 */

namespace Home\Model;

use Think\Model\RelationModel;

class ArticleModel extends RelationModel{

    //关联模型查询数据库
    protected $_link = array(

        'User' => self::BELONGS_TO
    );
}