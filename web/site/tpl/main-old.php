<style>
</style>
<div class="ci">
  <? $this->tpl('server', $d['ciServer']) ?>
  <? $this->tpl('server', $d['productionServer']) ?>
  <div style="clear: both"></div>
  <div class="servers">
    <? foreach ($d['testServers'] as $v) { ?>
      <? $this->tpl('testServer', $v) ?>
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