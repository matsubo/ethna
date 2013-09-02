<?php
namespace Ethna;
/**
 * Ethna_ActionClass.php
 *
 * @author Masaki Fujimoto <fujimoto@php.net>
 * @license http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @package Ethna
 * @version $Id$
 */
class ActionClass
{
    /**
     * Ethna_ActionClassのコンストラクタ
     *
     * @access public
     * @param object Ethna_Backend $backend backendオブジェクト
     */
    public function __construct($controller)
    {
    }

    /**
     * アクション実行前の認証処理を行う
     *
     * @access public
     * @return string 遷移名(nullなら正常終了, falseなら処理終了)
     */
    public function authenticate()
    {
        return null;
    }

    /**
     * アクション実行
     *
     * @access public
     * @return string 遷移名(nullなら遷移は行わない)
     */
    public function perform()
    {
        return null;
    }
}
