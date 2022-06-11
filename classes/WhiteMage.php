<?php

class WhiteMage extends Human
{
  const MAX_HITPOINT = 80;
  private $hitPoint = self::MAX_HITPOINT;
  private $attackPoint = 10;
  private $intelligence = 30; // 魔法攻撃力

  public function __construct($name)
  {
    parent::__construct($name, $this->hitPoint, $this->attackPoint);
  }

  public function doAttackByWhiteMage($enemy, $human)
  {
    if (rand(1,2) === 1) {
      echo $this->getName() . "のスキルが発動した!\n";
      echo "『ケアル』!!\n";
      echo $human->name . "のHPを" . $this->intelligence . "回復!\n";
      $human->recoveryDamage($this->intelligence * 1.5, $human);
    } else {
      parent::doAttack($enemy);
    }
  }
}