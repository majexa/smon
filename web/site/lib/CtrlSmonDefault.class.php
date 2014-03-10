<?php

class CtrlSmonDefault extends CtrlDefault {

  function action_default() {
    $mon = new SmonCore();
    $this->d['testStatus'] = $mon->cmd($mon->getCiServer(), 'ci status');
    $this->d['servers'] = FileCache::func(function() use ($mon) {
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
    }, 'servers4');
  }

}