<?php

class SmonCore {

  function getEpromoListOld() {
    $sample = [
      'host' => '176.9.151.229',
      'pass' => 'jsdh8132u9fr'
    ];
    $r = [];
    foreach ([22107, 22109, 22101] as $port) {
      $sample['port'] = $port;
      $r[] = $sample;
    }
    return $r;
  }

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

  function cmd(array $server, $cmd) {
    return trim(`ssh {$server['user']}@{$server['host']} -p {$server['port']} $cmd`);
  }

  function getEpromoListDocean() {
    return [
      [
        'host' => 'localhost',
        'pass' => 'qwdqwd',
        'name' => 'epromo: sman'
      ],
    ];
  }

  function getPersonalListDocean() {
    return [
      [
        'user' => 'root',
        'host' => '82.196.14.175',
        'pass' => 'fefg8fy23q',
        'name' => 'personal: dnsMaster'
      ],
      [
        'host' => '37.139.26.212',
        'pass' => '23gy8f',
        'name' => 'personal: projects1'
      ],
      /*
      [
        'user' => 'root',
        'host' => '198.211.120.127',
        'pass' => 'slrimeiivsxu',
        'name' => 'personal: sman'
      ]
      */
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