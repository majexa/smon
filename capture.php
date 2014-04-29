<?php

$projects = require NGN_ENV_PATH.'/config/projects.php';
foreach ($projects as $project) {
  if (!Misc::hasPrefix('design', $project['name'])) continue;
  output("processing {$project['domain']}");
  $dir = __DIR__;
  // -------------------------------------|look here:
  $path = $dir.'/'.Errors::checkText(trim(`phantomjs $dir/capture.js {$project['domain']}`));
  (new Image)->resizeAndSave($path, str_replace('.png', '_sm.png', $path), 150, 100);
  file_put_contents(__DIR__.'/.capture', time());
}

