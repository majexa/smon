<?php

class SmonCore {

  function getEpromoListOld() {
    $sample = [
      'host' => '176.9.151.229',
      'pass' => 'jsdh8132u9fr'
    ];
    $r = [];
    foreach ([22103, 22107, 22108, 22109] as $port) {
      $sample['port'] = $port;
      $r[] = $sample;
    }
    return $r;
  }

  function getCiServer() {
    return Arr::first(array_filter($this->getServers(), function ($v) {
      return (in_array($v['port'], [22103]));
    }));
  }

  function getTestServers() {
    return array_filter($this->getServers(), function ($v) {
      return true;
      //return (in_array($v['port'], [22107, 22109]));
    });
  }

  function title(array $server) {
    return "{$server['user']}@{$server['host']}:{$server['port']}";
  }

  function cmd(array $server, $cmd) {
    return trim(`ssh {$server['user']}@{$server['host']} -p {$server['port']} $cmd`);
  }

  function getEpromoListDocean() {
    die2(SMAN_PATH);
  }

  function getPersonalListDocean() {
    return [
      [
        'host' => 'localhost',
        'pass' => 'qwdqwd'
      ],
      [
        'user' => 'root',
        'host' => '82.196.14.175',
        'pass' => 'fefg8fy23q'
      ]
    ];
  }

  function getServers() {
    return array_map(function (array $v) {
      if (!isset($v['user'])) $v['user'] = 'user';
      if (!isset($v['port'])) $v['port'] = 22;
      return $v;
    }, array_merge( //
      $this->getEpromoListOld(), //$this->getEpromoListDocean(), //
      $this->getPersonalListDocean() //
    ));
  }


}