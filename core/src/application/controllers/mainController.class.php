<?php
/**
 * Created using PhpStorm.
 * Creator: Michael Dart
 *
 * AppName: The Void Framework
 */

class mainController extends Controller
{
    public function indexMethod()
    {
        load::view("main::index");

    }
}