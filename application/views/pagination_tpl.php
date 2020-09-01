<?php
$n        = ceil($count / $per_page);
$show_num = 2;
?>
<div class="text-left">
    <ul class="pagination">
        <?php if ($page != 1): ?><li><a href="<?=($page - 1 == 1) ? $url : $url . '/page/' . ($page - 1)?>">«</a></li><?php endif ?>

        <?php if ($page > 1): ?>
           <li><a href="<?=$url?>">1</a></li>
            <?php if ($page - $show_num > 2): ?>
                <li class="disabled"><a href="#">&hellip;</a></li>
            <?php endif ?>

            <?php for ($i = $page - $show_num; $i < $page; $i++): ?>
                <?php if ($i > 1): ?>
                    <li><a href="<?=$url . '/page/' . $i ?>"><?=$i?></a></li>
                <?php endif ?>
            <?php endfor ?>
        <?php endif ?>

        <li class="active"><a href="#"><?=$page?></a></li>

        <?php if ($page < $n): ?>
            <?php for ($i = $page + 1 ; $i < $page + $show_num + 1; $i++): ?>
                <?php if ($i < $n): ?>
                    <li><a href="<?=$url . '/page/' . $i ?>"><?=$i?></a></li>
                <?php endif ?>
            <?php endfor ?>

            <?php if ($page + $show_num < $n - 1): ?>
                <li class="disabled"><a href="#">&hellip;</a></li> 
            <?php endif ?>
            <li><a href="<?=$url . '/page/' . $n?>"><?=$n?></a></li>
        <?php endif ?>

        <?php if ($page != $n): ?><li><a href="<?=$url . '/page/' . ($page + 1)?>">»</a></li><?php endif ?>
    </ul>
</div>