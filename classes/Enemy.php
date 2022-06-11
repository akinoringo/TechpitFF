<?php

class Enemy
{
  // プロパティ
  const MAX_HITPOINT = 50;
  private $name;
  private $hitPoint = 50;
  private $attackPoint = 10;

  /**
   * Constructor
   */
  public function __construct($name)
  {
    $this->name = $name;
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
  public function doAttack($human)
  {
    echo $this->name . "の攻撃!\n";
    echo $human->getName() . "へ" . $this->attackPoint . "のダメージ!\n";
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