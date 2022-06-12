<?php

class WhiteMage extends Human
{
  const MAX_HITPOINT = 80;
  private $hitPoint = self::MAX_HITPOINT;
  private $attackPoint = 10;
  private $intelligence = 30; // 魔法攻撃力

  public function __construct($name)
  {
    parent::__construct($name, $this->hitPoint, $this->attackPoint, $this->intelligence);
  }

  public function doAttackByWhiteMage($enemies, $humans)
  {
    // 自身のHPが0以上か、敵のHPが0以上のときに攻撃可能
    if (!$this->isEnableAttack($enemies)) {
      return false;
    }

    if (rand(1,2) === 1) {
      // ターゲットの決定
      $human = $this->selectTarget($humans);

      echo $this->getName() . "のスキルが発動した!\n";
      echo "『ケアル』!!\n";
      echo $human->getName() . "のHPを" . $this->intelligence * 1.5 . "回復!\n";
      $human->recoveryDamage($this->intelligence * 1.5, $human);
    } else {
      parent::doAttack($enemies);
    }

    return true;
  }
}