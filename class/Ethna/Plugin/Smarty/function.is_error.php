<?php
/**
 *  smarty function:指定されたフォーム項目でエラーが発生しているかどうかを返す
 *
 *  @param  string  $name   フォーム項目名
 */
function smarty_function_is_error($params, &$smarty)
{
    $name = isset($params['name']) ? $params['name'] : null;
    return Ethna_Util::is_error($name);
}

