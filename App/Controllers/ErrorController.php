<?php


namespace App\Controllers;


use App\Core\Controller;

class ErrorController extends Controller
{
    public function pageNotFound()
    {
        header("http/1.0 404 not found");
        $this->view->render('404');
    }
}