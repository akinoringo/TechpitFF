<?php

class Loader
{
  // オートロード対象のディレクトリを保持するプロパティ
  private $directories = array();

  /**
   * Register Path for Autoload
   */
  public function registerDirectory($dir)
  {
    $this->directories[] = $dir;
    return;
  }

  /**
   * Register LoadClass Method
   */
  public function register()
  {
    spl_autoload_register(array($this, 'loadClass'));
  }

  /**
   * LoadClass Method
   */
  public function loadClass($className)
  {
    foreach ($this->directories as $dir) {
      $filePath = $dir . "/" . $className . ".php";
      if (is_readable($filePath)) {
        require $filePath;
        return;
      }
    }
  }
}