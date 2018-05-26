<?php
/**
 * Created using PhpStorm.
 * Creator: Michael Dart
 *
 * AppName: The Void Framework
 */

class Framework
{
    public static function run()
    {

        self::init();

        self::errorReporting();

        self::autoload();

        new config();

        new Router();

    }

    public static function init()
    {
        // Define path constants

        define("DS", '/');

        define("ROOT", getcwd() . DS);

        define("APP_PATH", ROOT . 'application' . DS);
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


        // Load core and configuration classes

        require_once (CORE_PATH . "Config.class.php");
        require_once (CORE_PATH . "Router.class.php");
        require_once (CORE_PATH . "InternalError.class.php");
        require_once (CORE_PATH . "Controller.class.php");
        require_once (CORE_PATH . "Loader.class.php");
        require_once (CORE_PATH . "Load.class.php");
        //require_once (DB_PATH . "Mysql.class.php");
        //require_once (CORE_PATH . "Model.class.php");

        // Start session

        session_start();
    }

    /**
     * Error Reporting
     * Check if site is under development, if so, turn on full error reporting
     */

    public static function errorReporting()
    {
        if ($GLOBALS["configs"]["development"]) {

            error_reporting(E_ALL);
            ini_set('display errors', 1);

        }

    }

    /**
     * Autoload Controller and Model Classes and Methods
     * Call load function through autoload register
     * Means that every new controller and model is loaded and initialized
     */

    public static function autoload()
    {

        spl_autoload_register(array(__CLASS__, 'load'));

    }


    /**
     * Load functions class for controller and models
     * @param $classname
     */

    private static function load($classname)
    {

        // Here simply autoload app’s controller and model classes

        if (substr($classname, -10) == "Controller") {

            // Controller

            require_once CURR_CONTROLLER_PATH . "$classname.class.php";

        } elseif (substr($classname, -5) == "Model") {

            // Model

            require_once MODEL_PATH . "$classname.class.php";

        }

    }

}