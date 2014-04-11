<?php

define('SMAN_PATH', dirname(dirname(__DIR__)).'/sman');

class Smon {

  /**
   * Отображает список всех серверов
   */
  function lst() {
    print "* ".Tt()->enumDddd(O::get('SmonCore')->getServers(), '$user.`@`.$host.($port != 22 ? `:`.$port : ``).($name ? ` - `.$name : ``)', "\n* ")."\n";
  }

  /**
   * Копирует локальный публичный ssh ключ на все серверы
   */
  function uploadKeys() {
    if (trim(`command -v sshpass >/dev/null && echo "y" || echo "n"`) == 'n') {
      print `sudo apt-get -y install sshpass`;
    }
    foreach (O::get('SmonCore')->getServers() as $server) {
      (new ShellSshKeyUploader(new ShellSshPasswordCmd($server)))->upload();
    }
  }

  /**
   * Показывает время последнего ci-апдейта
   */
  function status() {
    foreach (O::get('SmonCore')->getServers() as $v) {
      print '* '.str_pad(O::get('SmonCore')->title($v), 30).O::get('SmonCore')->cmd($v, 'ci status')."\n";
    }
  }

  /**
   * Должен (не доделан) отображать ветви всех серверов
   */
  protected function branches() {
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