<?php
/**
 *  for BC
 *
 *  @obsolete
 */
class Ethna
{
    public static function raiseError($message)
    {
        throw new Ethna_Exception($message);
    }
    public static function isError($object)
    {
        return false;
    }
}


