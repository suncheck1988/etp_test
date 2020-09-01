<?php
require_once 'init_app.php';

set_time_limit(0);

$web_statistic_page_file_path      = DOCROOT . 'data/1.txt';
$web_statistic_user_data_file_path = DOCROOT . 'data/2.txt';

$parser = new Service_FileParser();

$parser->parse_web_statistic_url_file($web_statistic_page_file_path, 5);
$parser->parse_web_statistic_user_info_file($web_statistic_user_data_file_path, 3);

echo 'Parsing ok';