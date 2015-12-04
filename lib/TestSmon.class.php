<?php

class TestSmon extends NgnTestCase {

  function test() {
    throw new Exception('!');
    $this->assertFalse(true, 'just some check for monitor');
    $this->assertFalse(true, 'just some check asd');
  }

}