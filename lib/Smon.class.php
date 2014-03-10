<?php

define('SMAN_PATH', dirname(dirname(__DIR__)).'/sman');

class Smon {

  function lst() {
    print "* ".Tt()->enumDddd(O::get('SmonCore')->getServers(), '$user.`@`.$host.($port ? `:`.$port : ``)', "\n* ")."\n";
  }

  function status() {
    foreach (O::get('SmonCore')->getServers() as $v) {
      print '* '.O::get('SmonCore')->title($v).' - '.O::get('SmonCore')->cmd($v, 'ci status')."\n";
    }
  }

  function uploadKeys() {
    foreach (O::get('SmonCore')->getServers() as $v) {
      (new ShellSshKeyUploader(new ShellSshPasswordCmd($v)))->upload();
    }
  }

  // последний апдейт
  // тесты не были успешно выполнены

}