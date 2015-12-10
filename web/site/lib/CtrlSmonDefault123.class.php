<?php

class CtrlSmonDefault123 extends CtrlDefault {

  function action_default() {
    $servers = require PROJECT_PATH.'/.servers.php';
    die2($servers);
  }

}