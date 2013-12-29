<?php

require dirname(__DIR__).'/ngn-env/ngn/init/cli-standalone.php';

$servers = [];
$p = 'jsdh8132u9fr';
foreach ([103, 104, 105, 106, 107, 108, 109] as $id) {
  $servers[] = "user@176.9.151.229:22$id -P $p";
}


prr(Cli::ssh($servers[0], 'php -v'));