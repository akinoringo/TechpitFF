<?php

class Brave extends Human
{
  const MAX_HITPOINT = 120;
  public $hitPoint = self::MAX_HITPOINT;
  public $attackPoint = 30;

  /**
   * Attack by Brave Method
   */
  public function doAttack($enemy)
  {
    if (rand(1,3) === 1) {
      echo $this->name . "のスキルが発動した\n";
      echo "『ぜんりょくぎり』\n";
      echo $enemy->name . "に" . $this->attackPoint * 1.5 . "のダメージ!\n";
      $enemy->receiveDamage($this->attackPoint * 1.5);
    } else {
      parent::doAttack($enemy);
    }
  }
}