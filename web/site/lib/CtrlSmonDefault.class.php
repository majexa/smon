<?php

class CtrlSmonDefault extends CtrlDefault {

  function action_default() {
    $this->d['status'] = `ci status`;
    $this->d['lastCaptureTime'] = file_get_contents(SMON_PATH.'/.capture');
    $this->d['captures'] = array_map(function($file) {
      return [
        'title' => str_replace('.june.majexa.ru_sm.png', '', basename($file)),
        'link' => 'http://'.str_replace('_sm.png', '', basename($file)).'/cpanel',
        'img' => $file
      ];
    }, glob('captures/*_sm*'));
  }

}