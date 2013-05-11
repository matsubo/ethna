<?php
/**
 *    Ethna_ActionClass.php
 *
 *    @author        Masaki Fujimoto <fujimoto@php.net>
 *    @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *    @package    Ethna
 *    @version    $Id$
 */
class Ethna_ActionClass
{
    /**#@+
     *    @access    private
     */

    /**    @var    object    Ethna_Backend        backendオブジェクト */
    protected $backend;

    /**    @var    object    Ethna_Config        設定オブジェクト    */
    protected $config;

    /**    @var    object    Ethna_ActionError    アクションエラーオブジェクト */
    protected $action_error;

    /**    @var    object    Ethna_ActionError    アクションエラーオブジェクト(省略形) */
    protected $ae;

    /**    @var    object    Ethna_ActionForm    アクションフォームオブジェクト */
    protected $action_form;

    /**    @var    object    Ethna_ActionForm    アクションフォームオブジェクト(省略形) */
    protected $af;

    /**    @var    object    Ethna_Session        セッションオブジェクト */
    protected $session;

    /**#@-*/

    /**
     *    Ethna_ActionClassのコンストラクタ
     *
     *    @access    public
     *    @param    object    Ethna_Backend    $backend    backendオブジェクト
     */
    public function __construct($backend)
    {
        $c = $backend->getController();
        $this->backend = $backend;
        $this->config = $this->backend->getConfig();

        $this->action_error = $this->backend->getActionError();
        $this->ae = $this->action_error;

        $this->action_form = $this->backend->getActionForm();
        $this->af = $this->action_form;

        $this->session = $this->backend->getSession();

        // Ethna_AppManagerオブジェクトの設定
        $manager_list = $c->getManagerList();
        foreach ($manager_list as $k => $v) {
            $this->$k = $backend->getManager($v);
        }
    }

    /**
     *    アクション実行前の認証処理を行う
     *
     *    @access    public
     *    @return    string    遷移名(nullなら正常終了, falseなら処理終了)
     */
    public function authenticate()
    {
        return null;
    }

    /**
     *    アクション実行前の処理(フォーム値チェック等)を行う
     *
     *    @access    public
     *    @return    string    遷移名(nullなら正常終了, falseなら処理終了)
     */
    public function prepare()
    {
        return null;
    }

    /**
     *    アクション実行
     *
     *    @access    public
     *    @return    string    遷移名(nullなら遷移は行わない)
     */
    public function perform()
    {
        return null;
    }
}

