<?php
namespace Ethna;
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
class View
{
  /** @private bool set true if output is performed */
  private $is_committed = false;
  public function __construct()
  {
  }
  public function redirect($url)
  {
    if ($this->is_committed) {
      return;
    }
     header(sprintf('Location: %s', $url));
    $this->is_committed = true;
  }
  public function json($array)
  {
    if ($this->is_committed) {
      return;
    }
     header("Content-Type: application/json; charset=utf-8");
    print json_encode($array);
    $this->is_committed = true;
  }
  public function defaultOutput($forward_name)
  {
    if ($this->is_committed) {
      return;
    }
    // @todo to be better default behavior
    print_r($forward_name);
    $this->is_committed = true;
  }
}
