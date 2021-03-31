<?php

namespace AndPHP\Constant;

/**
 * Created by PhpStorm.
 * User: DaXiong
 * Date: 2021/4/1
 * Time: 12:10 AM
 */
class Constant
{

    protected $class;
    protected $map;
    protected $message;

    public function __construct()
    {
        $this->__init();
        $this->map = array_flip((new \ReflectionClass($this->class))->getConstants());
    }

    public function __init()
    {
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getMessage($code)
    {
        return (new ConstDoc($this->class))->getDocComment($this->map[$code]);
    }

    public function getMap()
    {
        return $this->map;
    }

    public function getAllMessage()
    {

        return (new ConstDoc($this->class))->getDocComments();
    }

    public function getKeyValue()
    {
        $constObj = new ConstDoc($this->class);
        $title = $constObj->getDocComments();
        $value = $constObj->getConstants();
        $newArr = array_map(function($v1,$v2){
            return [
                'title' => $v1,
                'value' => $v2,
            ];
        },$title,$value);
        return $newArr;
    }
}