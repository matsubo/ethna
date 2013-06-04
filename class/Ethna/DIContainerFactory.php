<?php
namespace Ethna;
use Aura\Di\Container;
use Aura\Di\Forge;
use Aura\Di\Config;

new Config;

class DIContainerFactory
{
  public static function getContainer()
  {
    public static $di;
    if ($di) {
      return $di;
    }

    return $di = new Container(new Forge(new Config));
  }
}
