<?php
/**
 * Ethna_Const
 * - preserves class static variable
 *
 * @author Yuki Matsukura <matsubokkuri@gmail.com>
 * @version 1.0
 */
/**
 * Ethna_Const
 * 
 */
class Ethna_Const
{


    /** バージョン定義 */
    const ETHNA_VERSION =  '2.1.2-autoload';

    /** クライアント言語定義: 英語 */
    const LANG_EN =  'en';

    /** クライアント言語定義: 日本語 */
    const LANG_JA =  'ja';


    /** ゲートウェイ: WWW */
    const GATEWAY_WWW =  1;

    /** ゲートウェイ: CLI */
    const GATEWAY_CLI =  2;



    /** 要素型: 整数 */
    const VAR_TYPE_INT =  1;

    /** 要素型: 浮動小数点数 */
    const VAR_TYPE_FLOAT =  2;

    /** 要素型: 文字列 */
    const VAR_TYPE_STRING =  3;

    /** 要素型: 日付 */
    const VAR_TYPE_DATETIME =  4;

    /** 要素型: 真偽値 */
    const VAR_TYPE_BOOLEAN =  5;

    /** 要素型: ファイル */
    const VAR_TYPE_FILE =  6;


    /** フォーム型: text */
    const FORM_TYPE_TEXT =  1;

    /** フォーム型: password */
    const FORM_TYPE_PASSWORD =  2;

    /** フォーム型: textarea */
    const FORM_TYPE_TEXTAREA =  3;

    /** フォーム型: select */
    const FORM_TYPE_SELECT =  4;

    /** フォーム型: radio */
    const FORM_TYPE_RADIO =  5;

    /** フォーム型: checkbox */
    const FORM_TYPE_CHECKBOX =  6;

    /** フォーム型: button */
    const FORM_TYPE_SUBMIT =  7;

    /** フォーム型: file */
    const FORM_TYPE_FILE =  8;

    /** フォーム型: button */
    const FORM_TYPE_BUTTON =  9;

    /** フォーム型: hidden */
    const FORM_TYPE_HIDDEN =  10;


    /** エラーコード: 一般エラー */
    const E_GENERAL =  1;


    /** エラーコード: セッションエラー(有効期限切れ) */
    const E_SESSION_EXPIRE =  16;

    /** エラーコード: セッションエラー(IPアドレスチェックエラー) */
    const E_SESSION_IPCHECK =  17;

    /** エラーコード: アクション未定義エラー */
    const E_APP_UNDEFINED_ACTION =  32;

    /** エラーコード: アクションクラス未定義エラー */
    const E_APP_UNDEFINED_ACTIONCLASS =  33;

    /** エラーコード: アプリケーションオブジェクトID重複エラー */
    const E_APP_DUPENT =  34;

    /** エラーコード: アプリケーションメソッドが存在しない */
    const E_APP_NOMETHOD =  35;

    /** エラーコード: ロックエラー */
    const E_APP_LOCK =  36;

    /** エラーコード: CSV分割エラー(行継続) */
    const E_UTIL_CSV_CONTINUE =  64;

    /** エラーコード: フォーム値型エラー(スカラー引数に配列指定) */
    const E_FORM_WRONGTYPE_SCALAR =  128;

    /** エラーコード: フォーム値型エラー(配列引数にスカラー指定) */
    const E_FORM_WRONGTYPE_ARRAY =  129;

    /** エラーコード: フォーム値型エラー(整数型) */
    const E_FORM_WRONGTYPE_INT =  130;

    /** エラーコード: フォーム値型エラー(浮動小数点数型) */
    const E_FORM_WRONGTYPE_FLOAT =  131;

    /** エラーコード: フォーム値型エラー(日付型) */
    const E_FORM_WRONGTYPE_DATETIME =  132;

    /** エラーコード: フォーム値型エラー(BOOL型) */
    const E_FORM_WRONGTYPE_BOOLEAN =  133;

    /** エラーコード: フォーム値型エラー(FILE型) */
    const E_FORM_WRONGTYPE_FILE =  134;

    /** エラーコード: フォーム値必須エラー */
    const E_FORM_REQUIRED =  135;

    /** エラーコード: フォーム値最小値エラー(整数型) */
    const E_FORM_MIN_INT =  136;

    /** エラーコード: フォーム値最小値エラー(浮動小数点数型) */
    const E_FORM_MIN_FLOAT =  137;

    /** エラーコード: フォーム値最小値エラー(文字列型) */
    const E_FORM_MIN_STRING =  138;

    /** エラーコード: フォーム値最小値エラー(日付型) */
    const E_FORM_MIN_DATETIME =  139;

    /** エラーコード: フォーム値最小値エラー(ファイル型) */
    const E_FORM_MIN_FILE =  140;

    /** エラーコード: フォーム値最大値エラー(整数型) */
    const E_FORM_MAX_INT =  141;

    /** エラーコード: フォーム値最大値エラー(浮動小数点数型) */
    const E_FORM_MAX_FLOAT =  142;

    /** エラーコード: フォーム値最大値エラー(文字列型) */
    const E_FORM_MAX_STRING =  143;

    /** エラーコード: フォーム値最大値エラー(日付型) */
    const E_FORM_MAX_DATETIME =  144;

    /** エラーコード: フォーム値最大値エラー(ファイル型) */
    const E_FORM_MAX_FILE =  145;

    /** エラーコード: フォーム値文字種(正規表現)エラー */
    const E_FORM_REGEXP =  146;

    /** エラーコード: フォーム値数値(カスタムチェック)エラー */
    const E_FORM_INVALIDVALUE =  147;

    /** エラーコード: フォーム値文字種(カスタムチェック)エラー */
    const E_FORM_INVALIDCHAR =  148;

    /** エラーコード: 確認用エントリ入力エラー */
    const E_FORM_CONFIRM =  149;

    /** エラーコード: キャッシュタイプ不正 */
    const E_CACHE_INVALID_TYPE =  256;

    /** エラーコード: キャッシュ値なし */
    const E_CACHE_NO_VALUE =  257;

    /** エラーコード: キャッシュ有効期限 */
    const E_CACHE_EXPIRED =  258;

    /** エラーコード: キャッシュエラー(その他) */
    const E_CACHE_GENERAL =  259;



}






