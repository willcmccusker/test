<? $this->assign('title', $text["Text"]["title"]);?>
<div class='grid wide about' id='<?= $text["Text"]["slug"];?>'>
  <div class='col-1-4 tab-1-1'></div>
  <div class='col-2-4 tab-1-1'>
    <? echo $text["Text"]["content"];?>
  </div>
</div>