<?php

class CtrlSmonDefault extends CtrlDefault {

  function action_default() {
    $mon = new SmonCore();
    $this->d['ciServer'] = ['testStatus' => $mon->cmd($mon->getServerByPort(22103), 'ci status')];
    $this->d['productionServer'] = ['testStatus' => $mon->cmd($mon->getServerByPort(22105), 'ci status')];
    $this->d['testServers'] = [];
    return;
    $this->d['testServers'] = FileCache::func(function() use ($mon) {
      $r = [];
      foreach ($mon->getTestServers() as $server) {
        $r[] = [
          'title' => $mon->title($server),
          'maintainer' => $mon->cmd($server, 'pm localServer info maintainer'),
          'issues' => explode("\n", $mon->cmd($server, 'issue opened')),
          'testStatus' => $mon->cmd($server, 'ci status')
        ];
      }
      return $r;
    }, 'servers');
  }

}