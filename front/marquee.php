<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$ads = $Ad->all();
foreach ($ads as $key => $ad) {
?>
    <?=$ad['text']?>&nbsp;&nbsp;/&nbsp;&nbsp;
<?php
}
?>
</marquee>