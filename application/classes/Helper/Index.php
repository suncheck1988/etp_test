<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Класс помощник для генерации представления постраничной навигации
*/
class Helper_Index
{
    
    /**
     * @param integer $page Текущая страница навигации
     * @param integer $per_page Кол-во записей, выводимых на странице
     * @param integer $count Общее кол-во записей
     * @param string $url
     * 
     * @return mixed
     */
    public static function pagination($page, $per_page, $count, $url)
    {
        if (ceil($count / $per_page) <= 1) {
            return '';
        }

        $content = new View('pagination_tpl');
        $content->page     = $page;
        $content->per_page = $per_page;
        $content->count    = $count;
        $content->url      = $url;

        return $content;   
    }
}