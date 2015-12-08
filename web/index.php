<?

$statuses = require dirname(dirname(__DIR__)).'/ci/.status.php';
foreach ($statuses as $k => $v) {
  $statuses[$k]['name'] = $k == 'master' ? $k : str_replace('i-', 'issue-', $k);
}

?>
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
  table b {
    color: #808080;
    font-weight: bold;
    text-decoration: underline;
    display: block;
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
  .time {
    font-size: 11px;
    color: #808080;
    padding-right: 0;
  }
</style>

<table width="100%" class="main">
  <tr>
    <td class="server">
      <img src="/m/img/server.png">
      tester
    </td>
    <td>
      <b>branches</b>
      <table style="width:180px">
        <? foreach ($statuses as $v) { ?>
          <tr>
            <td width="1"><img src="/m/img/<?= $v['success'] ? 'passed' : 'failed' ?>.png"></td>
            <td class="name"><?= $v['name'] ?></td>
            <td class="time"><?= date('H:i', $v['time']) ?></td>
          </tr>
        <? } ?>
      </table>
    </td>
    <td width="100%">
      <? foreach ($statuses as $k => $v) { ?>
        <? if (!empty($v['errors'])) { ?>
          <b>errors on <?= $v['name'] ?></b>
          <pre id="<?= $v['name'] ?>">
<?= $v['errors'] ?>
          </pre>
        <? } ?>
      <? } ?>
    </td>
  </tr>
</table>

