<div class="comp server">
  <div class="tit"><?= $d['title'] ?></div>
  <div class="branches">
    <div class="branch <?= strstr($d['testStatus'], 'failed') ? 'failed' : 'passed' ?>">
      <? foreach ($d['issues'] as $issue) { ?>
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
  <div class="maintainer"><?= $d['maintainer'] ?></div>
</div>
