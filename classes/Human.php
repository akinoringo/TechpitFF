<?php

class Human
{
  // プロパティ
  const MAX_HITPOINT = 100;
  public $name;
  public $hitPoint = 100;
  public $attackPoint = 20;

  /**
   * Attack Method
   */
  public function doAttack($enemy)
  {
    echo $this->name . "の攻撃!\n";
    echo $enemy->name . "に" . $this->attackPoint . "のダメージ!\n";
    $enemy->receiveDamage($this->attackPoint);
  }

  /**
   * Receive a Damage Method
   */
  public function receiveDamage($damage)
  {
    $this->hitPoint -= $damage;
    if ($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }
}