<?php
// vim: foldmethod=marker
/**
 *	Ethna_Backend.php
 *
 *	@author		Masaki Fujimoto <fujimoto@php.net>
 *	@license	http://www.opensource.org/licenses/bsd-license.php The BSD License
 *	@package	Ethna
 *	@version	$Id$
 */

/**
 *	バックエンド処理クラス
 *
 *	@author		Masaki Fujimoto <fujimoto@php.net>
 *	@access		public
 *	@package	Ethna
 */
class Ethna_Backend
{
	/**#@+
	 *	@access		private
	 */

	/**	@var	object	Ethna_Controller	controllerオブジェクト */
	var	$controller;

	/**	@var	object	Ethna_Controller	controllerオブジェクト($controllerの省略形) */
	var	$ctl;

	/**	@var	object	Ethna_Config		設定オブジェクト */
	var	$config;

	/**	@var	object	Ethna_ActionError	アクションエラーオブジェクト */
	var $action_error;

	/**	@var	object	Ethna_ActionError	アクションエラーオブジェクト($action_errorの省略形) */
	var $ae;

	/**	@var	object	Ethna_ActionForm	アクションフォームオブジェクト */
	var $action_form;

	/**	@var	object	Ethna_ActionForm	アクションフォームオブジェクト($action_formの省略形) */
	var $af;

	/**	@var	object	Ethna_ActionClass	アクションクラスオブジェクト */
	var $action_class;

	/**	@var	object	Ethna_ActionClass	アクションクラスオブジェクト($action_classの省略形) */
	var $ac;

	/**	@var	object	Ethna_Session		セッションオブジェクト */
	var $session;

	/**	@var	array	マネージャオブジェクトキャッシュ */
	var $manager = array();

	/**#@-*/


	/**
	 *	Ethna_Backendクラスのコンストラクタ
	 *
	 *	@access	public
	 *	@param	object	Ethna_Controller	&$controller	コントローラオブジェクト
	 */
	function Ethna_Backend($controller)
	{
		// オブジェクトの設定
		$this->controller = $controller;
		$this->ctl = $this->controller;

		$this->config = $controller->getConfig();

		$this->action_error = $controller->getActionError();
		$this->ae = $this->action_error;
		$this->action_form = $controller->getActionForm();
		$this->af = $this->action_form;
		$this->action_class = null;
		$this->ac = $this->action_class;

		$this->session = $this->controller->getSession();

		// マネージャオブジェクトの生成(TODO: create on demand)
		$manager_list = $controller->getManagerList();
		foreach ($manager_list as $key => $value) {
			$class_name = $this->controller->getManagerClassName($value);
			$this->manager[$value] = new $class_name($this);
		}

		foreach ($manager_list as $key => $value) {
			foreach ($manager_list as $k => $v) {
				if ($v == $value) {
					/* skip myself */
					continue;
				}
				$this->manager[$value]->$k = $this->manager[$v];
			}
		}
	}

	/**
	 *	controllerオブジェクトへのアクセサ(R)
	 *
	 *	@access	public
	 *	@return	object	Ethna_Controller	controllerオブジェクト
	 */
	function getController()
	{
		return $this->controller;
	}

	/**
	 *	設定オブジェクトへのアクセサ(R)
	 *
	 *	@access	public
	 *	@return	object	Ethna_Config		設定オブジェクト
	 */
	function getConfig()
	{
		return $this->config;
	}

	/**
	 *	アプリケーションIDを返す
	 *
	 *	@access	public
	 *	@return	string	アプリケーションID
	 */
	function getAppId()
	{
		return $this->controller->getAppId();
	}

	/**
	 *	アクションエラーオブジェクトのアクセサ(R)
	 *
	 *	@access	public
	 *	@return	object	Ethna_ActionError	アクションエラーオブジェクト
	 */
	function getActionError()
	{
		return $this->action_error;
	}

	/**
	 *	アクションフォームオブジェクトのアクセサ(R)
	 *
	 *	@access	public
	 *	@return	object	Ethna_ActionForm	アクションフォームオブジェクト
	 */
	function getActionForm()
	{
		return $this->action_form;
	}

	/**
	 *	アクションフォームオブジェクトのアクセサ(W)
	 *
	 *	@access	public
	 */
	function setActionForm(&$action_form)
	{
		$this->action_form = $action_form;
        $this->af = $action_form;
	}

	/**
	 *	実行中のアクションクラスオブジェクトのアクセサ(R)
	 *
	 *	@access	public
	 *	@return	mixed	Ethna_ActionClass:アクションクラス null:アクションクラス未定
	 */
	function getActionClass()
	{
		return $this->action_class;
	}

	/**
	 *	実行中のアクションクラスオブジェクトのアクセサ(W)
	 *
	 *	@access	public
	 */
	function setActionClass(&$action_class)
	{
        $this->action_class = $action_class;
        $this->ac = $action_class;
	}

	/**
	 *	セッションオブジェクトのアクセサ(R)
	 *
	 *	@access	public
	 *	@return	object	Ethna_Session	セッションオブジェクト
	 */
	function getSession()
	{
		return $this->session;
	}

	/**
	 *	マネージャオブジェクトへのアクセサ(R)
	 *
	 *	@access	public
	 *	@return	object	Ethna_AppManager	マネージャオブジェクト
	 */
	function getManager($type)
	{
		if (isset($this->manager[$type])) {
			return $this->manager[$type];
		}
		return null;
	}

	/**
	 *	アプリケーションのベースディレクトリを取得する
	 *
	 *	@access	public
	 *	@return	string	ベースディレクトリのパス名
	 */
	function getBasedir()
	{
		return $this->controller->getBasedir();
	}

	/**
	 *	アプリケーションのテンプレートディレクトリを取得する
	 *
	 *	@access	public
	 *	@return	string	テンプレートディレクトリのパス名
	 */
	function getTemplatedir()
	{
		return $this->controller->getTemplatedir();
	}

	/**
	 *	アプリケーションの設定ディレクトリを取得する
	 *
	 *	@access	public
	 *	@return	string	設定ディレクトリのパス名
	 */
	function getEtcdir()
	{
		return $this->controller->getDirectory('etc');
	}

	/**
	 *	アプリケーションのテンポラリディレクトリを取得する
	 *
	 *	@access	public
	 *	@return	string	テンポラリディレクトリのパス名
	 */
	function getTmpdir()
	{
		return $this->controller->getDirectory('tmp');
	}

	/**
	 *	アプリケーションのテンプレートファイル拡張子を取得する
	 *
	 *	@access	public
	 *	@return	string	テンプレートファイルの拡張子
	 */
	function getTemplateext()
	{
		return $this->controller->getExt('tpl');
	}

	/**
	 *	バックエンド処理を実行する
	 *
	 *	@access	public
	 *	@param	string	$action_name	実行するアクションの名称
	 *	@return	mixed	(string):Forward名(nullならforwardしない) Ethna_Error:エラー
	 */
	function perform($action_name)
	{
		$forward_name = null;

		$action_class_name = $this->controller->getActionClassName($action_name);
		$this->action_class = new $action_class_name($this);
		$this->ac = $this->action_class;

		// アクションの実行
		$forward_name = $this->ac->authenticate();
		if ($forward_name === false) {
			return null;
		} else if ($forward_name !== null) {
			return $forward_name;
		}

		$forward_name = $this->ac->prepare();
		if ($forward_name === false) {
			return null;
		} else if ($forward_name !== null) {
			return $forward_name;
		}

		$forward_name = $this->ac->perform();

		return $forward_name;
	}
}

