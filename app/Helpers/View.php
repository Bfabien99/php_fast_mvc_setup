<?php
namespace App\Helpers;

/**
 * Summary of View
 *
 * interact with views folder
 */
class View{

    /**
     * Summary of render
     * 
     * return a view from views folder
     * 
     * @param string $filepath
     * @param array $params
     * @return void
     */
    public static function render(string $filepath, array $params = []): void{
        extract($params);
        require_once VIEWS_PATH . $filepath . '.php';
    }
}