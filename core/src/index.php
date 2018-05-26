<?php
/**
 * Created using PhpStorm.
 * Creator: Michael Dart
 *
 * AppName: The Void Framework
 */

/**
 * Directory Setup
 *
 * src
 * |- application
 * | |- controllers
 * | |- models
 * | |- views
 * |
 * |- framework
 * | |- core
 * | |- database
 * | |- helpers
 * | |- libraries
 * |
 * |- public
 * | |- css
 * | |- images
 * | |= js
 * | |- uploads
 *
 */

require_once('framework/core/Framework.class.php');

Framework::run();