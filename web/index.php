<?php

define('PROJECT_KEY', 'smon');
define('WEBROOT_PATH', __DIR__);

require dirname(dirname(__DIR__)).'/ngn/init/web-standalone.php';

print (new DefaultRouter(['disableSession' => true]))->dispatch()->getOutput();

