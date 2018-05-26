<?php
/**
 * Created using PhpStorm.
 * Creator: Michael Dart
 *
 * AppName: The Void Framework
 */

class Load
{
    public static function view($viewFile, $viewVars = array())
    {
        extract($viewVars);
        $viewFileCheck = explode(".", $viewFile);
        if (!isset($viewFileCheck[1]))
        {
            $viewFile .= ".php";
        }

        $viewFile = str_replace("::", "/", $viewFile);

        require_once (CURR_VIEW_PATH . $viewFile);
    }

}