<?php

class BlackMage extends Human
{
  // プロパティ
  const MAX_HITPOINT = 80;
  private $hitPoint = self::MAX_HITPOINT;
  private $attackPoint = 10;
  private $intelligence = 30; // 魔法攻撃力

  public function __construct($name)
  {
    parent::__construct($name, $this->hitPoint, $this->attackPoint);
  }

  public function doAttack($enemy)
  {
    if (rand(1,2) === 1) {
      echo $this->getName() . "の攻撃!\n";
      echo $enemy->getName() . "に" . $this->intelligence * 1.5 . "のダメージ!\n";
      $enemy->receiveDamage($this->intelligence * 1.5);
    } else {
      parent::doAttack($enemy);
    }
  }
}