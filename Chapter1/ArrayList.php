<?php
/**
 * Class ArrayList
 * PHPでJavaの様なArrayListを実現するならこんな感じ？
 */
class ArrayList
{
    private $list = array();

    public function Add($object) {
        array_push($this->list, $object);
    }

    public function Remove($key) {
        if (array_key_exists($key, $this->list)) {
            unset($this->list[$key]);
        }
    }

    public function Size() {
        return count($this->list);
    }

    public function IsEmpty() {
        return empty($this->list);
    }

    public function GetObj($key) {
        if (array_key_exists($key, $this->list)) {
            return $this->list[$key];
        } else {
            return null;
        }
    }

    public function GetKey($object) {
        $arrKeys = array_keys($this->list, $object);

        if(empty($arrKeys)) {
            return -1;
        } else {
            return $arrKeys[0];
        }
    }
}