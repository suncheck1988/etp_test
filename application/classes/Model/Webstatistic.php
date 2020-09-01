<?php defined('SYSPATH') or die('No direct script access.');

class Model_WebStatistic extends ORM
{
    protected $_table_name = 'web_statistic';
 
    // Кол-во записей выводимых на странице
    const ROWS_PER_PAGE = 5;
    
    /**
     * Добавление записи веб статистики
     * 
     * @param array $data Массив данных одной строки лога (1.txt)
     * 
     * @return void
     * @throws Database_Exception
     */
    public function add_url_statistic($data)
    {
        try {
            DB::insert('web_statistic', ['ip', 'url_from', 'url_to', 'date'])
                ->values([ip2long($data[2]), Security::xss_clean($data[3]), Security::xss_clean($data[4]), strtotime($data[0] . ' ' . $data[1])])
                ->execute();
        } catch (Database_Exception $e) {
            if (strstr($e->getMessage(), 'повторяющееся значение ключа нарушает ограничение уникальности') === false) {        
                throw $e;
            }
        }
    }
    
    /**
     * Добавление os и browser для ip
     * 
     * @param array $data Массив данных одной строки лога (2.txt)
     * 
     * @return void
     */
    public function add_user_info($data)
    {
        DB::update('web_statistic')
            ->set(['browser' => $data[1], 'os' => $data[2]])
            ->where('ip', '=', ip2long($data[0]))
            ->execute(); 
    }
    
     /**
     * @param integer $page
     * @param boolean $count Признак необходимости получения общего кол-ва записей
     * 
     * @return mixed
     */
    public static function get_statistic($page = null, $count = false)
    {
        $_count = self::get_rows_per_page();
        $offset = ($page - 1) * $_count;
        
        if ($count) {
            $total_count = DB::query(
                Database::SELECT,
                "SELECT COUNT(DISTINCT(ip)) as total_count FROM web_statistic"
            )->execute()->as_array()[0]['total_count'];
            
            return (int)$total_count;
        }
        
        $result = DB::query(
            Database::SELECT,
            "SELECT one.ip, one.browser, one.os, two.url_from, one.url_to, three.count_unique_url 
                FROM (
                    SELECT ip, url_to, browser, os
                    FROM web_statistic AS ws
                    WHERE date = (SELECT max(date) FROM web_statistic WHERE ip = ws.ip)
                ) as one
                LEFT JOIN (
                    SELECT ip, url_from 
                    FROM web_statistic AS ws
                    WHERE date = (SELECT min(date) FROM web_statistic WHERE ip = ws.ip)
                ) as two ON two.ip = one.ip
                LEFT JOIN (
                    SELECT ip, COUNT(DISTINCT(url_to)) as count_unique_url
                    FROM web_statistic AS ws
                    GROUP BY ip
                ) as three ON three.ip = one.ip
                ORDER BY one.ip OFFSET " . $offset . " LIMIT " . $_count
        )->execute()->as_array();
        
        return $result;
    }
    
    /**
     * @return integer
     */
    public static function get_rows_per_page()
    {
        return self::ROWS_PER_PAGE;
    }
}