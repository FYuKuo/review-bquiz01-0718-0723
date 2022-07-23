<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $STR->header; ?></p>
    <form method="post" action="../api/update.php" >
        <table width="70%" class="cent" style="margin: auto;">
            <tbody>
                <?php
                $row =  $DB->find(1);
                ?>
                    <tr>

                        <td class="yel">
                        <?= $STR->text; ?>
                        </td>
                        <td>
                            <input type="text" name="text" id="text" value="<?= $row['text'] ?>" style="width: 80%">
                        </td>
                    </tr>

                    <input type="hidden" name="table" value="<?=$do?>">
                    <input type="hidden" name="id" value="<?=$row['id']?>">
            </tbody>
        </table>
        <table style="margin: auto; margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td colspan="2" class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>