<?php

class Human extends Lives
{
  // プロパティ
  const MAX_HITPOINT = 100;

  /**
   * Constructor
   */
  public function __construct($name, $hitPoint = 100, $attackPoint = 20, $intelligence = 0)
  {
    parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
  }
}