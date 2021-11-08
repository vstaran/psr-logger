<?php

    include "vendor/autoload.php";

    // --------
    // FileLog Example
    // --------

    $fileLog = new Logger\Logger(
        new \Logger\writers\FileWriter('default.log'),
        new \Logger\Formater()
    );


    $fileLog->info("Info message");
    $fileLog->alert("Alert message");
    $fileLog->error("Error message");
    $fileLog->debug("Debug message");
    $fileLog->notice("Notice message");
    $fileLog->warning("Warning message");
    $fileLog->critical("Critical message");
    $fileLog->emergency("Emergency message");



    // --------
    // DbLog Example
    // --------

    $dbLog = new Logger\Logger(
        new \Logger\writers\DbWriter('localhost', 'root', 'root', 'test'),
        new \Logger\Formater()
    );

    $dbLog->info("Info message");
    $dbLog->alert("Alert message");
    $dbLog->error("Error message");
    $dbLog->debug("Debug message");
    $dbLog->notice("Notice message");
    $dbLog->warning("Warning message");
    $dbLog->critical("Critical message");
    $dbLog->emergency("Emergency message");



    // --------
    // SysLog Example
    // --------

    $sysLog = new Logger\Logger(
        new \Logger\writers\SysLogWriter(),
        new \Logger\Formater()
    );

    $sysLog->info("Info message");
    $sysLog->alert("Alert message");
    $sysLog->error("Error message");
    $sysLog->debug("Debug message");
    $sysLog->notice("Notice message");
    $sysLog->warning("Warning message");
    $sysLog->critical("Critical message");
    $sysLog->emergency("Emergency message");


