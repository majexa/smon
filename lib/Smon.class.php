<?php

define('SMAN_PATH', dirname(dirname(__DIR__)).'/sman');

class Smon {

  function lst() {
    print "* ".Tt()->enumDddd(O::get('SmonCore')->getServers(), '$user.`@`.$host.($port != 22 ? `:`.$port : ``).($name ? ` - `.$name : ``)', "\n* ")."\n";
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

  function branches() {
    foreach (O::get('SmonCore')->getServers() as $v) {
      $cmd = new ShellSshCmd($v);
      output(O::get('SmonCore')->title($v));
      $cmd->cmd(<<<CMD
for dir in `ls /home/user/ngn-env`;
do
  if [ -d "/home/user/ngn-env/\$dir/.git" ]; then
    echo "\$dir"
  fi
done
CMD
    );
      break;
    }
  }

  // последний апдейт
  // тесты не были успешно выполнены

}