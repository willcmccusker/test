<? $this->assign('title', $text["Text"]["title"]);?>

<div class='grid wide about'>
  <div class='col-1-1'>
    <div class='page-header'><?=$text["Text"]["title"]?></div>
  </div>
</div>
<div class='grid wide about' id='<?= $text["Text"]["slug"];?>'>
  <div class='col-1-1'>
    <? echo $text["Text"]["content"];?>
  </div>
</div>