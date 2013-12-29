<?

// мониториться должно всё без использования ngn
// список серверов брать по ссылке

$server = require '123';
file_get_contents('http://server-manager.'.$server['baseName'].'/c/asd');

?>
<table>
<tr>
  <td>server</td>
  <td>last update</td>
  <td>errors</td>
</tr>
<? foreach ($servers as $v) { ?>
<tr>
  <td><?= $v['name'] ?></td>
  <td><?= $v['dateUpdate'] ?></td>
  <td><?= $v['errors'] ?></td>
</tr>
<? } ?>
</table>