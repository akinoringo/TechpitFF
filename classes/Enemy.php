<?php

class Enemy extends Lives
{
  // プロパティ
  const MAX_HITPOINT = 50;

  /**
   * Constructor
   */
  public function __construct($name, $attackPoint)
  {
    $hitPoint = self::MAX_HITPOINT;
    $intelligence = 0;
    parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
  }
}