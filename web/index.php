<?

$statuses = require dirname(dirname(__DIR__)).'/ci/.status.php';
foreach ($statuses as $k => $v) {
  $statuses[$k]['name'] = $k == 'master' ? $k : str_replace('i-', 'issue-', $k);
}

?>
<style>
  table td {
    vertical-align: top;
    padding-right: 30px;
  }
  table li {
    list-style: none;
  }
</style>
<table>
  <tr>
    <td>
      <img src="/m/img/server.png"><br>
      staging
    </td>
    <td>
      <b>branches</b>
      <ul>
      <? foreach ($statuses as $v) { ?>
        <li>
          <a href="#" onclick="document.getElementById('<?= $v['name'] ?>').display='block';">
            <img src="/m/img/<?= $v['success'] ? 'passed' : 'failed' ?>.png">
            &nbsp;<?= date('d.m.Y H:i', $v['time']) ?>
            <?= $v['name'] ?>
            </li>
          </a>
      <? } ?>
      </ul>
    </td>
    <td>
      <? foreach ($statuses as $k => $v) { ?>
        <pre id="<?= $v['name'] ?>" styl e="display:none">
<?= $v['errors'] ?>
        </pre>
      <? } ?>
    </td>
  </tr>
</table>

