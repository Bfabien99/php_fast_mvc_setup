<?php
namespace App\Controllers;

use App\Helpers\View;

class HomeController extends Controller{
    public function index(){
        View::render('home/index', ['page' => 'index']);
    }
}