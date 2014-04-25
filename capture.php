<?php

$projects = require NGN_ENV_PATH.'/config/projects.php';
foreach ($projects as $project) {
  if (!Misc::hasPrefix('design', $project['name'])) continue;
  output("processing {$project['domain']}");
  $dir = __DIR__;
  $path = $dir.'/'.trim(`phantomjs $dir/capture.js {$project['domain']}`);
  (new Image)->resizeAndSave($path, str_replace('.png', '_sm.png', $path), 300, 200);
}

