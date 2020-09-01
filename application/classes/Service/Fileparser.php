<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс сервис для парсинга логов
*/
class Service_FileParser
{
    
    /**
     * @param string $path Путь к логу
     * @param integer $count_elements Кол-во значений, разделенных символом "|"
     * 
     * @return void
     */
    public static function parse_web_statistic_url_file($path, $count_elements)
    {
        $iterator = self::_read_file($path);

        foreach ($iterator as $iteration) {
            $data = explode('|', $iteration);
            if (count($data) == $count_elements) {
                ORM::factory('webstatistic')->add_url_statistic($data);
            }
        }
    }

    /**
     * @param string $path Путь к логу
     * @param integer $count_elements Кол-во значений, разделенных символом "|"
     * 
     * @return void
     */
    public static function parse_web_statistic_user_info_file($path, $count_elements)
    {
        $iterator = self::_read_file($path);

        foreach ($iterator as $iteration) {
            $data = explode('|', $iteration);
            if (count($data) == $count_elements) {
                ORM::factory('webstatistic')->add_user_info($data);
            }
        }
    }
    
    /**
     * Чтение лога
     * 
     * @param string $path Путь к логу
     * 
     * @return void
     */
    protected static function _read_file($path) {
        $handle = fopen($path, 'r');

        while (!feof($handle)) {
            yield trim(fgets($handle));
        }

        fclose($handle);
    }
}