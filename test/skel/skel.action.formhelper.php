<?php
/**
 *  {$action_path}
 *
 *  @author     {$author}
 *  @package    {$project_id}
 *  @version    $Id$
 */

/**
 *  {$action_name} Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    {$project_id}
 */
class {$action_form} extends {$project_id}_ActionForm
{
    /**
     *  @access private
     *  @var    array   form definition.
     */
    protected $form = array(

        /**  Ethna_Const::FORM_TYPE_TEXT のテスト  */

        'text_noval' => array(
            'type' => Ethna_Const::VAR_TYPE_INT,
            'name' => 'textarea_noval',
            'form_type' => Ethna_Const::FORM_TYPE_TEXT,
        ),
        'text_setactval' => array(
            'type' => Ethna_Const::VAR_TYPE_STRING,
            'name' => 'text_setval',
            'form_type' => Ethna_Const::FORM_TYPE_TEXT,
            'max' => 10,  // maxlength は無視されなければならない
        ),
        'text_settplval' => array(
            'type' => Ethna_Const::VAR_TYPE_STRING,
            'name' => 'text_settplval',
            'form_type' => Ethna_Const::FORM_TYPE_TEXT,
            'max' => 10,  // maxlength は無視されなければならない
        ),

        /**  Ethna_Const::FORM_TYPE_TEXTAREA のテスト  */

        //   テンプレートでvalue属性を設定しない場合
        'textarea_noval' => array(
            'type' => Ethna_Const::VAR_TYPE_INT,
            'name' => 'textarea_noval',
            'form_type' => Ethna_Const::FORM_TYPE_TEXTAREA,
        ),
        //   アクションフォームに値が設定されており、
        //   テンプレートでvalue属性を設定しない場合
        'textarea_setactval' => array(
            'type' => Ethna_Const::VAR_TYPE_INT,
            'name' => 'textarea_setactval',
            'form_type' => Ethna_Const::FORM_TYPE_TEXTAREA,
        ),
        //   テンプレートでvalue属性を設定した場合
        'textarea_settplval' => array(
            'type' => Ethna_Const::VAR_TYPE_INT,
            'name' => 'textarea_settplval',
            'form_type' => Ethna_Const::FORM_TYPE_TEXTAREA,
        ),
   );
}

/**
 *  {$action_name} action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    {$project_id}
 */
class {$action_class} extends {$project_id}_ActionClass
{
    /**
     *  preprocess of {$action_name} Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        return null;
    }

    /**
     *  {$action_name} action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return '{$action_name}';
    }
}

