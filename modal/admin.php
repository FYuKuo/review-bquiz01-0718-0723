<?php
$do = $_GET['do'] ?? 'title';
include('../api/base.php');
?>
<h3 class="cent"><?= $STR->addHeader; ?></h3>
<hr>
<form action="../api/add.php" method="post">
    <table class="m-auto">
        <tr>
            <td>
                <?= $STR->acc; ?>：
            </td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td>
                <?= $STR->pw; ?>：
            </td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td>
                <?= $STR->pwCheck; ?>：
            </td>
            <td>
                <input type="password" name="pwCh" id="pwCh">
            </td>
        </tr>
        <tr>
            <td colspan="2" class="cent">
                <input type="hidden" name="table" value="<?=$do?>">
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>