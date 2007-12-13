<?php
// vim: foldmethod=marker tabstop=4 shiftwidth=4 autoindent
/**
 *  Ethna_Plugin_Urlhandler.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id$
 */

// {{{ Ethna_Plugin_Urlhandler
/**
 *  Urlhandler�ץ饰����δ��쥯�饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Urlhandler
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Backend   backend���֥������� */
    var $backend;

    /** @var    object  Ethna_Logger    �������֥������� */
    var $logger;

    /**#@-*/

    /**
     *  Ethna_Plugin_Urlhandler���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    $controller ����ȥ����饪�֥�������
     */
    function Ethna_Plugin_Urlhandler(&$controller)
    {
        $this->backend =& $controller->getBackend();
        $this->logger =& $controller->getLogger();
    }

    /**
     *  ����������桼���ꥯ�����Ȥ��Ѵ�����
     *
     *  @param string $action
     *  @param array $param
     *  @access public
     *  @return array array($path_string, $path_key)
     */
    function actionToRequest($action, $param)
    {
        die('override!');
    }

    /**
     *  �桼���ꥯ�����Ȥ򥢥��������Ѵ�����
     *
     *  @param array $http_vars
     *  @access public
     *  @return array $http_vars with 'action_foobar' => 'true' element.
     */
    function requestToAction($http_vars)
    {
        die('override!');
    }

    /**
     *  ����������ꥯ�����ȥѥ�᡼�����Ѵ�����
     *
     *  @access public
     *  @param array $http_vars
     *  @param string $action
     *  @return $http_vars with 'action_foobar' element.
     */
    function buildActionParameter($http_vars, $action)
    {
        if ($action == "") {
            return $http_vars;
        }
        $key = sprintf('action_%s', $action);
        $http_vars[$key] = 'true';
        return $http_vars;
    }

    /**
     *  �ѥ�᡼����URL���Ѵ�����
     *
     *  @access public
     *  @param array $query query list 
     *  @return string query string
     */
    function buildQueryParameter($query)
    {
        $param = '';

        foreach ($query as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    if (is_numeric($k)) {
                        $k = '';
                    }
                    $param .= sprintf('%s=%s&',
                                      urlencode(sprintf('%s[%s]', $key, $k)),
                                      urlencode($v));
                }
            } else if (is_null($value) == false) {
                $param .= sprintf('%s=%s&', urlencode($key), urlencode($value));
            }
        }

        return substr($param, 0, -1);
    }
}
// }}}

?>