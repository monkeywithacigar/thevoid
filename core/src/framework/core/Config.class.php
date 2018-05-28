<?php
/**
 * Created using PhpStorm.
 * Creator: Michael Dart
 *
 * AppName: The Void Framework
 */

class config
{

    /**
     * config constructor.
     * All main global configuration variables.
     * May be altered to individual application requirements.
     * Will be altered from database once setup
     */

    public function __construct()
    {

        // Define path constants

        define("DS", '/');

        define("ROOT", getcwd() . DS);

        define("APP_PATH", ROOT . "application" . DS);
        define("FRAMEWORK_PATH", ROOT . "framework" . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);


        define("CONFIG_PATH", APP_PATH . "config" . DS);
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        define("MODEL_PATH", APP_PATH . "models" . DS);
        define("VIEW_PATH", APP_PATH . "views" . DS);


        define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
        define('DB_PATH', FRAMEWORK_PATH . "database" . DS);
        define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
        define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);
        define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);

        // Define platform, controller, action, for example:
        // index.php?p=admin&c=Goods&a=add

        //define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : 'home');
        //define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index');
        //define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index');

        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH);
        define("CURR_VIEW_PATH", VIEW_PATH);

        $GLOBALS["config"] = array(
            "appName"   => "theVoid",
            "domain"    => "localhost",
            "development" => true,
            "path"      => array(
                "app"           => "application/",
                "framework"     => "framework/",
                "index"         => "index.php"
            ),
            "defaults"  => array(
                "controller"    => "main",
                "method"        => "index"
            ),
            "routes"    => array(),
            "database"  => array(
                "host"          => "",
                "user"          => "",
                "password"      => "",
                "database"      => ""
            )
        );

    }

}