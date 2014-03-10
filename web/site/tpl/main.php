<style>
  body {
    font-family: Tahoma;
    font-size: 11px;
  }
  .comp {
    width: 200px;
    height: 200px;
    float: left;
  }
  .comp .tit {
    text-align: center;
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  .comp.server .branches {
    height: 50px;
  }
  .comp.work-station .branches {
    height: 70px;
  }
  .comp.work-station .icon {
    width: 100%;
    height: 110px;
    background: url(/m/img/work-station.png) no-repeat center 0px;
  }
  .comp.server .icon {
    width: 100%;
    height: 70px;
    background: url(/m/img/server.png) no-repeat center 0px;
  }
  .branch {
    padding: 10px 0px 10px 40px;
  }
  .branch.failed {
    background: url(/m/img/failed.png) no-repeat 0px center;
  }
  .branch.disabled {
    background: url(/m/img/disabled.png) no-repeat 0px center;
  }
  .branch.passed {
    background: url(/m/img/passed.png) no-repeat 5px center;
  }
  .maintainer {
    text-align: center;
    font-size: 14px;
  }
</style>
<div class="ci">
  <!--
  <div class="comp server">
    <div class="icon"></div>
  </div>
  -->
  <div class="comp server ci">
    <div class="branches">
      <div class="branch <?= strstr($d['testStatus'], 'failed') ? 'failed' : 'passed' ?>">
        <div class="proj"><?= $d['testStatus'] ?></div>
      </div>
    </div>
    <div class="icon"></div>
    <div class="maintainer">CI</div>
  </div>
  <div style="clear: both"></div>
  <div class="servers">
    <? foreach ($d['servers'] as $server) { ?>
    <div class="comp server">
      <div class="tit"><?= $server['title'] ?></div>
      <div class="branches">
        <div class="branch <?= strstr($server['testStatus'], 'failed') ? 'failed' : 'passed' ?>">
          <? foreach ($server['issues'] as $issue) { ?>
            <div class="proj"><?= $issue ?></div>
          <? } ?>
        </div>
        <!--
        <div class="branch passed">
          <div class="proj">master</div>
        </div>
        -->
      </div>
      <div class="icon"></div>
      <div class="maintainer"><?= $server['maintainer'] ?></div>
    </div>
    <? } ?>
  </div>
  <div style="clear: both"></div>
<!--
  <div class="work-stations">
    <div class="comp work-station">
      <div class="branches">
        <div class="branch disabled">
          <div class="proj">formatron: issue-182</div>
          <div class="proj">ngn: issue-182</div>
          <div class="proj">kp: issue-182</div>
        </div>
      </div>
      <div class="icon"></div>
      <div class="maintainer">наташа</div>
    </div>
    <div class="comp work-station">
      <div class="branches">
        <div class="branch disabled">
          <div class="proj">aop: issue-185</div>
          <div class="proj">ngn: issue-185</div>
        </div>
      </div>
      <div class="icon"></div>
      <div class="maintainer">андрей</div>
    </div>
    <div class="comp work-station">
      <div class="branches">
        <div class="branch disabled">
          <div class="proj">ao: issue-187</div>
        </div>
      </div>
      <div class="icon"></div>
      <div class="maintainer">саша</div>
    </div>
  </div>

</div>
  -->