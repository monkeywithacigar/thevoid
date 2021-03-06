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

        // Load core and configuration classes

        require_once (CORE_PATH . "Config.class.php");
        require_once (CORE_PATH . "Router.class.php");
        require_once (CORE_PATH . "InternalError.class.php");
        require_once (CORE_PATH . "Controller.class.php");
        require_once (CORE_PATH . "Loader.class.php");
        require_once (CORE_PATH . "Load.class.php");
        //require_once (DB_PATH . "Mysql.class.php");
        //require_once (CORE_PATH . "Model.class.php");

        // Start session - this will go to a session class

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