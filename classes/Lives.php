<?php

class Lives
{
  // プロパティ
  private $name;
  private $hitPoint;
  private $attackPoint;
  private $intelligence; // 魔法攻撃力

  public function __construct
  (
    $name,
    $hitPoint = 50,
    $attackPoint = 10,
    $intelligence = 0
  )
  {
    $this->name = $name;
    $this->hitPoint = $hitPoint;
    $this->attackPoint = $attackPoint;
    $this->intelligence = $intelligence;
  }

  /**
   * Getter for Name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Getter for HitPoint
   */
  public function getHitPoint()
  {
    $result = $this->hitPoint;
    if ($result < 0) {
      $result = 0;
    }
    return $result;
  }

  /**
   * Getter for AttackPoint
   */
  public function getAttackPoint()
  {
    return $this->attackPoint;
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

  /**
   * Attack Method
   */
  public function doAttack($targets)
  {
    if (!$this->isEnableAttack($targets)) {
      return false;
    }

    $target = $this->selectTarget($targets);

    echo $this->name . "の攻撃!\n";
    echo $target->getName() . "に" . $this->attackPoint . "のダメージ!\n";
    $target->receiveDamage($this->attackPoint);

    return true;
  }

  /**
   * Check Attackable Method
   */
  public function isEnableAttack($targets)
  {
    // 自身のHPが0以下であれば、攻撃不可
    if ($this->hitPoint <= 0) {
      return false;
    }

    // 敵のHPが0以上であれば、攻撃可能
    foreach ($targets as $target) {
      if ($target->getHitPoint() > 0) {
        return true;
      }
    }

    // チェックを抜けると攻撃不可
    return false;
  }

  /**
   * Select Target Method
   */
  public function selectTarget($targets)
  {
    $target = $targets[rand(0, count($targets) - 1 )];
    // 敵のHPが0以下の場合再度ターゲットを決める
    while ($target->getHitPoint() <= 0) {
      $target = $targets[rand(0, count($targets) - 1 )];
    }
    return $target;
  }
}