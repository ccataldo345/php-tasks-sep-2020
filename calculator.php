<?php

class calculator {

  public $value;
  public $taxRate;
  public $installments;
  // private const BASE_INDEX = 11%;

  public function __construct($value, $taxRate, $installments) {
    $this->value = $value;
    $this->tax = $taxRate;
    $this->installments = $installments;
  }

  public function calculateBasePrice($value) {
    return number_format($value * 0.11, 2,".","");
  }

  public function calculateCommission($value) {
    return number_format($value * 0.11 * 0.17, 2,".","");
  }

  public function calculateTax($value, $taxRate) {
    return number_format($value * 0.11 * $taxRate/100, 2,".","");
  }
   
  public function calculateTotalCost($value, $taxRate) {
    return number_format((($value * 0.11) + ($value * 0.11 * 0.17) + ($value * 0.11 * $taxRate/100)), 2,".","");
  }

}
