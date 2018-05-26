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