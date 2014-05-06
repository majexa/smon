<?php

define('WEBROOT_PATH', __DIR__);
define('PROJECT_KEY', 'smon');
require dirname(dirname(__DIR__)).'/ngn/init/web-standalone.php';
require dirname(__DIR__).'/init.php'; // smon init
Lib::addFolder(NGN_ENV_PATH.'/run/lib');
print (new DefaultRouter(['disableSession' => true]))->dispatch()->getOutput();