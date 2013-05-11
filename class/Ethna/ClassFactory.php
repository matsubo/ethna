<?php
/**
 * Ethna_ClassFactory.php
 *
 * @author Masaki Fujimoto <fujimoto@php.net>
 * @license http://www.opensource.org/licenses/bsd-license.php The BSD License
 * @package Ethna
 * @version $Id$
 */
/**
 * Ethnaフレームワークのオブジェクト生成ゲートウェイ
 *
 * DIコンテナか、ということも考えましたがEthnaではこの程度の単純なものに
 * 留めておきます。アプリケーションレベルDIしたい場合はフィルタチェインを
 * 使って実現することも出来ます。
 *
 * @author Masaki Fujimoto <fujimoto@php.net>
 * @access public
 * @package Ethna
 */
class Ethna_ClassFactory
{
    /** @var object Ethna_Controller controllerオブジェクト */
    protected $controller;

    /** @var object Ethna_Controller controllerオブジェクト(省略形) */
    protected $ctl;

    /** @var array クラス定義 */
    protected $class = array();

    /** @var array 生成済みオブジェクトキャッシュ */
    protected $object = array();


    /**
     * Ethna_ClassFactoryクラスのコンストラクタ
     *
     * @access public
     * @param object Ethna_Controller $controller controllerオブジェクト
     * @param array $class クラス定義
     */
    public function __construct($controller, $class)
    {
        $this->controller = $controller;
        $this->ctl = $controller;
        $this->class = $class;
    }

    /**
     * クラスキーに対応するオブジェクトを返す
     *
     * @access public
     * @param string $key クラスキー
     * @param bool $weak オブジェクトが未生成の場合の強制生成フラグ(default: false)
     * @return object 生成されたオブジェクト(エラーならnull)
     */
    public function getObject($key, $weak = false)
    {
        if (isset($this->class[$key]) == false) {
            return null;
        }
        $class_name = $this->class[$key];
        if (isset($this->object[$key]) && is_object($this->object[$key])) {
            return $this->object[$key];
        }

        $method = sprintf('_getObject_%s', ucfirst($key));
        if (method_exists($this, $method)) {
            $obj = $this->$method($class_name);
        } else {
            $obj = new $class_name();
        }
        $this->object[$key] = $obj;

        return $obj;
    }

    /**
     * クラスキーに対応するクラス名を返す
     *
     * @access public
     * @param string $key クラスキー
     * @return string クラス名
     */
    public function getObjectName($key)
    {
        if (isset($this->class[$key]) == false) {
            return null;
        }

        return $this->class[$key];
    }

    /**
     * オブジェクト生成メソッド(backend)
     *
     * @access protected
     * @param string $class_name クラス名
     * @return object 生成されたオブジェクト(エラーならnull)
     */
    protected function _getObject_Backend($class_name)
    {
        $_ret_object = new $class_name($this->ctl);
        return $_ret_object;
    }
    /**
     * オブジェクト生成メソッド(session)
     *
     * @access protected
     * @param string $class_name クラス名
     * @return object 生成されたオブジェクト(エラーならnull)
     */
    protected function _getObject_Session($class_name)
    {
        $_ret_object = new $class_name($this->ctl->getAppId(), $this->ctl->getDirectory('tmp'));
        return $_ret_object;
    }
}

