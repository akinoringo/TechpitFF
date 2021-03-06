<?php

class Message {

  /**
   * ステータス表示
   */
  public function displayStatusMessage($objects)
  {
    foreach ($objects as $object) {
      echo $object->getName() . ":" . $object->getHitPoint() . "/" . $object::MAX_HITPOINT. "\n";
    }
    echo "\n";
  }

  /**
   * 攻撃メッセージ
   */
  public function displayAttackMessage($objects, $targets)
  {
    foreach ($objects as $object) {
      if (get_class($object) === "WhiteMage") {
        $attackResult = $object->doAttackByWhiteMage($targets, $objects);
      } else {
        $attackResult = $object->doAttack($targets);
      }
      if ($attackResult) {
        echo "\n";
      }
      $attackResult = false;
    }
    echo "\n";
  }
}