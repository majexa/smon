<style>
  .a {
    display: inline-block;
    width: 320px;
  }
</style>
<p>ci status: <?= `ci status` ?></p>
<? foreach (glob('captures/*_sm*') as $file) { ?>
  <div class="a">
    <?= str_replace('.png', '', basename($file)) ?><br>
    <img src="<?= $file ?>" />
  </div>
<? } ?>