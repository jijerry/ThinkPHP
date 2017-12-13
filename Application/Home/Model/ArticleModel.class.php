<?php
/**
 * Created by PhpStorm.
 * User: jerry
 * Date: 2017/12/13
 * Time: 16:36
 */

namespace Home\Model;

use Think\Model;

class ArticleModel extends Model{

    protected $_link = array(

        'User' => self::BELONGS_TO
    );
}