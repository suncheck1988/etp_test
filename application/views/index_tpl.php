<?php if (!empty($ar_web_statistic)): ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>IP-адрес</th>
                <th>Браузер</th>
                <th>ОС</th>
                <th>URL с которого зашел первый раз</th>
                <th>URL на который зашел последний раз</th>
                <th>кол-во просмотренных уникальных URL-адресов</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ar_web_statistic as $item): ?>
                <tr>
                    <td><?=long2ip($item['ip'])?></td>
                    <td><?=$item['browser']?></td>
                    <td><?=$item['os']?></td>
                    <td><?=$item['url_from']?></td>
                    <td><?=$item['url_to']?></td>
                    <td><?=$item['count_unique_url']?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    
    <?=Helper_Index::pagination($pagination['page'], $pagination['per_page'], $pagination['count'], '/statistic')?>
<?php endif ?>