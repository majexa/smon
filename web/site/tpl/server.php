<div class="comp server <?= $d['type'] ?: 'ci' ?>">
  <div class="branches">
    <div class="branch <?= strstr($d['testStatus'], 'failed') ? 'failed' : 'passed' ?>">
      <div class="proj"><?= $d['testStatus'] ?></div>
    </div>
  </div>
  <div class="icon"></div>
  <div class="maintainer">CI</div>
</div>
