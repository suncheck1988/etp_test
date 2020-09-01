<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Базовый контроллер приложения, расширяет системный
 * Генерирует представление для приложения
*/
abstract class Controller_Base extends Controller
{
    // Определение базового шаблона
    protected $_layout = 'layout_tpl';
    
    /**
     * Генерация представления и передача базовому шаблону приложения
     * 
     * @param string $title HTML заголовок страницы
     * @param integer $content Сгенерированное представление контроллера наследника
     * 
     * @return void
    */
    public function print_template($title, $content, $description = '')
    {
        $this->_layout = new View($this->_layout);

        $this->_layout->title       = $title;
        $this->_layout->content     = $content;
        $this->_layout->description = $description;

        $this->response->body($this->_layout);
    }
}