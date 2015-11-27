<?php

class CtrlSmonDefault extends CtrlDefault {

  function action_default() {
    $servers = require PROJECT_PATH.'/.servers.php';
    die2($servers);
  }

}