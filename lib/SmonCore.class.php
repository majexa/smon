<?php

class SmonCore {

  function getServerByPort($port) {
    return Arr::first(array_filter($this->getServers(), function ($v) use ($port) {
      return (in_array($v['port'], [$port]));
    }));
  }

  function getTestServers() {
    return array_filter($this->getServers(), function ($v) {
      return true;
    });
  }

  function title(array $server) {
    return isset($server['name']) ? $server['name'] : "{$server['user']}@{$server['host']}:{$server['port']}";
  }

  protected function cmdCache($server, $cmd) {
    $hash = implode('', $server).$cmd;
    $file = __DIR__.'/.cmdCache.php';
    //FileVar::formatVar()
  }


  function cmd(array $server, $cmd) {
    if (($r = $this->cmdCache($server, $cmd))) {
      return $this->cache($server, $cmd);
    }
    return trim(`ssh {$server['user']}@{$server['host']} -p {$server['port']} $cmd`);
  }

  function getServers() {
    return array_map(function (array $v) {
      if (!isset($v['user'])) $v['user'] = 'user';
      if (!isset($v['port'])) $v['port'] = 22;
      return $v;
    }, require dirname(__DIR__).'/.servers.php');
  }

}