<?php

class Enemy
{
  // プロパティ
  const MAX_HITPOINT = 50;
  public $name;
  public $hitPoint = 50;
  public $attackPoint = 10;

  /**
   * Attack Method
   */
  public function doAttack($human)
  {
    echo $this->name . "の攻撃!\n";
    echo $human->name . "へ" . $this->attackPoint . "のダメージ!\n";
    $human->receiveDamage($this->attackPoint);
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