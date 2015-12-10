<html>
<head>
  <style>
    body {
      margin: 12px;
      font-size: 12px;
      font-family: Tahoma;
    }
    .a {
      display: inline-block;
      margin: 0 10px 10px 0;
    }
    .a a:hover {
      color: #000;
    }
    p {
      margin: 0;
      padding: 0;
      padding-bottom: 7px;
    }
    .shadow {
      border: 1px solid #888;
      box-shadow: 0px 0px 5px #555;
    }
  </style>
  <meta http-equiv="refresh" content="120">
</head>
<body>
<p><b>last ci update:</b><br><?= $d['status'] ?></p>
<p><b>last captures update:</b><br><?= date('d.m.Y H:i:s', $d['lastCaptureTime']) ?></p>
<? foreach ($d['captures'] as $v) { ?>
  <div class="a">
    <!--<a href="<?= $v['link'] ?>" target="_blank">-->
    <p><?= $v['title'] ?></p>
    <img src="<?= $v['img'] ?>" class="shadow" />
    <!--</a>-->
  </div>
<? } ?>
</body>
</html>