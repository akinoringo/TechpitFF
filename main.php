<?php

// ファイルのロード
require_once('./lib/Loader.php');
require_once('./lib/Utility.php');

$loader = new Loader();
$loader->registerDirectory(__DIR__ . '/classes');
$loader->registerDirectory(__DIR__ . '/classes/constants');
$loader->register();

// インスタンス化
$members = array();
$members[] = Brave::getInstance(CharacterName::TIIDA);
$members[] = new WhiteMage(CharacterName::YUNA);
$members[] = new BlackMage(CharacterName::RULU);

$enemies = array();
$enemies[] = new Enemy(EnemyName::GOBLIN, 20);
$enemies[] = new Enemy(EnemyName::BOMB, 25);
$enemies[] = new Enemy(EnemyName::MORBOL, 30);

$turn = 1;

$isFinishFlag = false;

$messageObj = new Message();

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