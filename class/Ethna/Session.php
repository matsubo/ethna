<?php
namespace Ethna;
/**
 * Ethna_Session.php
 *
 * @author Masaki Fujimoto <fujimoto@php.net>
 * @license http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @package Ethna
 * @version $Id$
 */

/**
 * セッションクラス
 *
 * @author Masaki Fujimoto <fujimoto@php.net>
 * @access public
 * @package Ethna
 */
class Session
{
  public function __construct()
  {
    session_start();
  }
    /**
     * セッションを破棄する
     *
     * @access public
     * @return bool true:正常終了 false:エラー
     */
    public function destroy()
    {
       session_destroy();
    }

    /**
     * セッション値へのアクセサ(R)
     *
     * @access public
     * @param  string $name キー
     * @return mixed  取得した値(null:セッションが開始されていない)
     */
    public function get($name)
    {
        if (isset($_SESSION[$name])) {
          return $_SESSION[$name];
        }
    }

    /**
     * セッション値へのアクセサ(W)
     *
     * @access public
     * @param  string $name  キー
     * @param  string $value 値
     * @return bool   true:正常終了 false:エラー(セッションが開始されていない)
     */
    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * セッションの値を破棄する
     *
     * @access public
     * @param  string $name キー
     * @return bool   true:正常終了 false:エラー(セッションが開始されていない)
     */
    public function remove($name)
    {
        unset($_SESSION[$name]);
    }
}
