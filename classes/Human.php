<?php

class Human
{
  // プロパティ
  const MAX_HITPOINT = 100;
  private $name;
  private $hitPoint = 100;
  private $attackPoint = 20;

  /**
   * Constructor
   */
  public function __construct($name, $hitPoint = 100, $attackPoint = 20)
  {
    $this->name = $name;
    $this->hitPoint = $hitPoint;
    $this->attackPoint = $attackPoint;
  }

  /**
   * Getter for Name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Getter for Name
   */
  public function getHitPoint()
  {
    return $this->hitPoint;
  }

  /**
   * Getter for Name
   */
  public function getAttackPoint()
  {
    return $this->attackPoint;
  }

  /**
   * Attack Method
   */
  public function doAttack($enemy)
  {
    echo $this->name . "の攻撃!\n";
    echo $enemy->getName() . "に" . $this->attackPoint . "のダメージ!\n";
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

  /**
   * Recovery Damage Method
   */
  public function recoveryDamage($heal, $target)
  {
    $this->hitPoint += $heal;
    if ($this->hitPoint > $target::MAX_HITPOINT) {
      $this->hitPoint = $target::MAX_HITPOINT;
    }
  }
}