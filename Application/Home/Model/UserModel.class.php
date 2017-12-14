<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/13
 * Time: 11:45
 *
 * 模型类操作数据库
 * thinkPHP会自动定位到表
 * protected $tablePrefix =''
 * protected $tableName ='users'
 */

namespace Home\Model;

use Think\Model\RelationModel;

class UserModel extends RelationModel{

    //自动完成数据处理和过滤（添加时间戳，安全字段过滤，业务逻辑自动处理）
    protected $_auto = array (
        array('created_at','date("Y-m-d H:i:s", time())',3,'function'),
        array('updated_at','date("Y-m-d H:i:s", time())',3,'function'),
    );

    //添加关联模型
    protected $_link = array(
        'Article' =>self::HAS_MANY
    );

}