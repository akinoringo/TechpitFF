<?php

// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

// インスタンス化
$members = array();
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');

$enemies = array();
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルボブ', 30);

$turn = 1;

$isFinishFlag = false;

while (!$isFinishFlag) {
  // ターンの表示
  echo "*** $turn ターン目 ***\n\n";

  // 現在のHPの表示
  foreach ($members as $member) {
    echo $member->getName() . ":" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
  }
  echo "\n";
  foreach ($enemies as $enemy) {
    echo $enemy->getName() . ":" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
  }
  echo "\n";

  // 攻撃
  foreach ($members as $member) {
    if (get_class($member) === 'WhiteMage') {
      $member->doAttackByWhiteMage($enemies, $members);
    } else {
      $member->doAttack($enemies);
    }
    echo "\n";
  }
  echo "\n";

  foreach ($enemies as $enemy) {
    $enemy->doAttack($members);
    echo "\n";
  }
  echo "\n";

  // プレイヤーが全滅している場合は、戦闘終了
  $deathCount = 0;
  foreach ($members as $member) {
    if ($member->getHitPoint() > 0) {
      $isFinishFlag = false;
      break;
    }
    $deathCount++;
  }

  if ($deathCount === count($members)) {
    $isFinishFlag = true;
    echo "GAME OVER....\n\n";
    break;
  }

  // 敵が全滅している場合は、戦闘終了
  $deathCount = 0;
  foreach ($enemies as $enemy) {
    if ($enemy->getHitPoint() > 0) {
      $isFinishFlag = false;
      break;
    }
    $deathCount++;
  }

  if ($deathCount === count($enemies)) {
    $isFinishFlag = true;
    echo "♪♪♪ファンファーレ♪♪♪\n\n";
    break;
  }

  $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
foreach ($members as $member) {
  echo $member->getName() . ":" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
}
echo "\n";
foreach ($enemies as $enemy) {
  echo $enemy->getName() . ":" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
}