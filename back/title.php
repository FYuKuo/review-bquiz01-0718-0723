<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $STR->header; ?></p>
    <form method="post" action="../api/edit.php">
        <table width="100%" class="cent">
            <tbody>
                <tr class="yel">
                    <td width="45%"><?= $STR->img ?></td>
                    <td width="23%"><?= $STR->text ?></td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows =  $Title->all();
                // dd($rows);
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <img src="../img/<?= $row['img'] ?>" alt="" style="width: 300px; height:30px;">
                        </td>
                        <td>
                            <?= $row['text'] ?>
                        </td>
                        <td>
                            <input type="radio" name="sh" id="sh" <?= ($row['sh'] == 1) ? 'checked' : '' ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" id="del">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','../modal/updateImg.php')" value="<?= $STR->updateBtn ?>">
                        </td>
                    </tr>

                    <input type="hidden" name="table" value="<?=$do?>">
                    <input type="hidden" name="id" value="<?=$row['id']?>">
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','../modal/<?= $do ?>.php')" value="<?= $STR->addBtn ?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>