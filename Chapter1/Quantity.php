<?php

/**
 * Class Quantity
 * 値の範囲を制限してプログラムをわかりやすく安全にする
 * （PHP 7.4以上）
 */
class Quantity
{
    public int $min = 1;
    public int $max = 100;

    public int $value;

    public function Quantity(int $value):int {
        try {
            if ($value < $this->min ) {
                throw new ErrorException("不正" . $this->min . "未満");
            }
            if ($value > $this->max) {
                throw new ErrorException("不正" . $this->max . "超");
            }

            return $value;

        }catch (ErrorException $e){
            return $e->getMessage();
        }
    }

    public function canAdd(Quantity $other):boolean {
        int:$added = $this->addValue($other);
        return $added <= $this->max;
    }

    public function add(Quantity $other) {
        try {
            if (!$this->canAdd($other)) {
                throw new ErrorException("不正:合計が" . $this->max . "超");
            }

            int:$added = $this->addValue($other);
            return new Quantity($added);

        }catch (ErrorException $e) {
            return $e->getMessage();
        }
    }

    private function addValue(Quantity $other):int {
        return $this->value + $other->value;
    }
}