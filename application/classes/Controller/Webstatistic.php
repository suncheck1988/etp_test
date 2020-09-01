<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Контроллер генерации представления таблицы статистики
*/
class Controller_WebStatistic extends Controller_Base
{
    /**
     * @return void
    */
    public function action_index()
    {  
        $page = $this->request->param('page') ? (int)$this->request->param('page') : 1;
        
        $content = new View('index_tpl'); 
        $content->ar_web_statistic = Model_WebStatistic::get_statistic($page); 
        $content->pagination       = [
            'page'     => $page,
            'per_page' => Model_WebStatistic::get_rows_per_page(),
            'count'    => Model_WebStatistic::get_statistic($page, true)
        ];
        
        $this->print_template('Веб статистика', $content, 'Веб статистика, в разрезе IP-адресов');
    }
} 