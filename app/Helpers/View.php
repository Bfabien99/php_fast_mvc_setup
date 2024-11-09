<?php
namespace App\Helpers;

class View{
    public static function render(string $filepath, array $params = []): void{
        extract($params);
        require_once VIEWS_PATH . $filepath . '.php';
    }
}