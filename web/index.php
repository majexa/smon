<?

$statuses = require dirname(dirname(__DIR__)).'/ci/.status.php';
foreach ($statuses as $k => $v) {
  $statuses[$k]['name'] = $k == 'master' ? $k : str_replace('i-', 'issue-', $k);
}
print '<pre>';
print_r($statuses);
die();

?>

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
          <a href="#" onclick="document.getElementById('<?= $v['time'] ?>').display='block';">
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
        <pre id="<?= $v['name'] ?>" style="display:none">
          <?= $v['errors'] ?>
        </pre>
      <? } ?>
    </td>
  </tr>
</table>

