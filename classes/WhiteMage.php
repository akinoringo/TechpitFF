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

  public function doAttackByWhiteMage($enemies, $humans)
  {
    if ($this->getHitPoint() <= 0) {
      return false;
    }

    $humanIndex = rand(0, count($humans) - 1);
    $human = $humans[$humanIndex];

    if (rand(1,2) === 1) {
      echo $this->getName() . "のスキルが発動した!\n";
      echo "『ケアル』!!\n";
      echo $human->getName() . "のHPを" . $this->intelligence . "回復!\n";
      $human->recoveryDamage($this->intelligence * 1.5, $human);
    } else {
      parent::doAttack($enemies);
    }
  }
}