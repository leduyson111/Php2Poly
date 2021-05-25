<?php
namespace App\Controllers;
use Jenssegers\Blade\Blade;

class BaseController{
    protected function render($viewFile, $viewData = []){
        $blade = new Blade('./app/views', './storage');

        echo $blade->make($viewFile, $viewData)->render();
    }
}


?>