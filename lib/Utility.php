<?php

function isFinish($objects) {
  $deathCount = 0;
  foreach ($objects as $object) {
    // 一人でもHPが0以上であればfalseを返す
    if ($object->getHitPoint() > 0) {
      return false;
    }
    $deathCount++;
  }

  // 仲間の数が死亡数と同じであればtrueを返す
  if ($deathCount === count($objects)) {
    return true;
  }
}