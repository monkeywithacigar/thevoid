<?php
/**
 * Created using PhpStorm.
 * Creator: Michael Dart
 *
 * AppName: The Void Framework
 */

class Loader
{
    // Load library classes

    public function library($lib){

        include_once (LIB_PATH . "$lib.class.php");

    }


    // loader helper functions. Naming conversion is xxx_helper.php;

    public function helper($helper){

        include_once (HELPER_PATH . "{$helper}_helper.php");

    }
}