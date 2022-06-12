<?php

class Brave extends Human
{
  const MAX_HITPOINT = 120;
  private $hitPoint = self::MAX_HITPOINT;
  private $attackPoint = 30;

  public function __construct($name)
  {
    parent::__construct($name, $this->hitPoint, $this->attackPoint);
  }

  /**
   * Attack by Brave Method
   */
  public function doAttack($enemies)
  {
    // 自身のHPが0以上か、敵のHPが0以上のときに攻撃可能
    if (!$this->isEnableAttack($enemies)) {
      return false;
    }

    $enemy = $this->selectTarget($enemies);

    if (rand(1,3) === 1) {
      echo $this->getName() . "のスキルが発動した\n";
      echo "『ぜんりょくぎり』\n";
      echo $enemy->getName() . "に" . $this->getAttackPoint() * 1.5 . "のダメージ!\n";
      $enemy->receiveDamage($this->getAttackPoint() * 1.5);
    } else {
      parent::doAttack($enemies);
    }

    return true;
  }
}