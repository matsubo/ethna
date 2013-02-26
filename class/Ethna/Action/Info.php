<?php
// vim: foldmethod=marker
// {{{ Ethna_Action_Info
/**
 *	__ethna_info__アクションの実装
 *
 *	@author		Masaki Fujimoto <fujimoto@php.net>
 *	@access		public
 *	@package	Ethna
 */
class Ethna_Action_Info extends Ethna_ActionClass
{
	/**
	 *	__ethna_info__アクションの前処理
	 *
	 *	@access	public
	 *	@return	string		Forward先(正常終了ならnull)
	 */
	function prepare()
	{
		return null;
	}

	/**
	 *	__ethna_info__アクションの実装
	 *
	 *	@access	public
	 *	@return	string	遷移名
	 */
	function perform()
	{
		return '__ethna_info__';
	}
}
// }}}

