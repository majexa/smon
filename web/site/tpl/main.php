<?

$statuses = require NGN_ENV_PATH.'/ci/.status.php';
foreach ($statuses as $k => $v) {
  $statuses[$k]['name'] = $k == 'master' ? $k : str_replace('i-', 'issue-', $k);
}

?>

<meta http-equiv="refresh" content="10">

<style>
  body {
    font-family: arial, helvetica, sans-serif;
  }
  .server img {
    display: block;
    margin-top: 30px;
    margin-bottom: 10px;
  }
  .server {
    font-size: 14px !important;
    text-align: center;
  }
  table.main > tbody > tr > td {
    vertical-align: top;
    padding-right: 30px;
    font-size: 11px;
  }
  table h2 {
    color: #808080;
    font-weight: bold;
    text-decoration: underline;
    display: block;
    margin: 0;
    margin-bottom: 10px;
    font-size: 14px;
  }
  table table td {
    font-size: 14px;
    padding-right: 15px;
  }
  table table {
    width: 100%;
  }
  table table .name {
    width: 100%;
  }
  pre {
    font-size: 10px;
  }
  .time {
    font-size: 11px;
    color: #808080;
    padding-right: 0;
  }
  .error {
    color: #f00;
  }
</style>

<table width="100%" class="main">
  <tr>
    <td class="server">
      <img src="/m/img/server.png">
      tester
    </td>
    <td>
      <h2>branches</h2>
      <? if (!$statuses['master']['success']) { ?>
        <p class="error">Fix <b>master</b> and continue your dev!</p>
      <? } ?>
      <table style="width:180px">
        <? foreach ($statuses as $v) { ?>
          <tr>
            <td width="1"><img src="/m/img/<?= $v['success'] ? 'passed' : 'failed' ?>.png"></td>
            <td class="name"><?= $v['name'] ?></td>
            <td class="time"><?= Date::recentTime($v['time']) ?></td>
          </tr>
        <? } ?>
      </table>
    </td>
    <td width="100%">
      <? foreach ($statuses as $k => $v) { ?>
        <? if (!empty($v['errors'])) { ?>
          <h2>errors on <?= $v['name'] ?></h2>
          <pre id="<?= $v['name'] ?>">
<?= $v['errors'] ?>
          </pre>
        <? } ?>
      <? } ?>
    </td>
  </tr>
</table>

