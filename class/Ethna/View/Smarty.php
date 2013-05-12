<?php
namespace Ethna\View;
/**
 * Sample
 *
 * @author Yuki Matsukura <matsubokkuri@gmail.com>
 * @version 1.0
 */
/**
 * Sample class
 *
 */
abstract class Smarty
{
  protected $smarty;
  public function __construct()
  {
    $this->smarty = new \Smarty();
  }

  public function getEngine()
  {
    return $this->smarty;
  }

  public function execute($forward_name)
  {
    $this->smarty->display($forward_name);
  }
}


