<?php

// ファイルのロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');
require_once('./classes/Message.php');

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

$messageObj = new Message();

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

while (!$isFinishFlag) {
  // ターンの表示
  echo "*** $turn ターン目 ***\n\n";

  // 現在のHPの表示
  $messageObj->displayStatusMessage($members);
  $messageObj->displayStatusMessage($enemies);

  // 攻撃
  $messageObj->displayAttackMessage($members, $enemies);
  $messageObj->displayAttackMessage($enemies, $members);

  // プレイヤーが全滅している場合は、戦闘終了
  $isFinishFlag = isFinish($members);
  if ($isFinishFlag) {
    $message = "GAME OVER ....\n\n";
    break;
  }

  // 敵が全滅している場合は、戦闘終了
  $isFinishFlag = isFinish($enemies);
  if ($isFinishFlag) {
    $message = "♪♪♪ファンファーレ♪♪♪\n\n";
    break;
  }

  $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $message;

// HPの表示
$messageObj->displayStatusMessage($members);
$messageObj->displayStatusMessage($enemies);