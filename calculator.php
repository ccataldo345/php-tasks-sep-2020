<?php

class calculator
{

  private $value;
  private $taxRate;
  private $installments;
  private const BASE_INDEX = 0.11;

  public function __construct($value, $taxRate, $installments)
  {
    $this->value = $value;
    $this->tax = $taxRate;
    $this->installments = $installments;
  }

  public function calculateBasePrice($value)
  {
    return number_format($value * self::BASE_INDEX, 2, ".", "");
  }

  public function calculateCommission($value)
  {
    return number_format($value * self::BASE_INDEX * 0.17, 2, ".", "");
  }

  public function calculateTax($value, $taxRate)
  {
    return number_format($value * self::BASE_INDEX * $taxRate / 100, 2, ".", "");
  }

  public function calculateTotalCost($value, $taxRate)
  {
    return number_format((($value * self::BASE_INDEX) + ($value * self::BASE_INDEX * 0.17) +
     ($value * self::BASE_INDEX * $taxRate / 100)), 2, ".", "");
  }
}
