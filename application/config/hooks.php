<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
use Tracy\Debugger;
$hook['pre_system'] = function() {
    $dotenv = Dotenv\Dotenv::createImmutable(FCPATH.'../');
    $dotenv->load();

    if (ENVIRONMENT !== 'production') {
        Debugger::enable(Debugger::DEVELOPMENT, APPPATH . 'logs');
    } else {
        Debugger::enable(Debugger::PRODUCTION, APPPATH . 'logs');
    }
    Debugger::$logSeverity = E_NOTICE | E_WARNING;
};
