<?php
$do = $_GET['do'] ?? 'title';
include('../api/base.php');
?>
<h3 class="cent"><?= $STR->updateHeader; ?></h3>
<hr>
<form action="../api/upload.php" method="post" enctype="multipart/form-data">
    <table class="m-auto">
        <tr>
            <td>
                <?= $STR->updateImg; ?>
            </td>
            <td>
                <input type="file" name="img" id="img">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="cent">
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <input type="hidden" name="table" value="<?=$do?>">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>