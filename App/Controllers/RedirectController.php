<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\Url;

class RedirectController extends Controller
{
    public function fetch()
    {
        $route = ltrim($_SERVER['REQUEST_URI'], '/');
        $urlModel = new Url();
        $urlObject = $urlModel->findOne($route, true);

        if ($urlObject) {

            $urlObject->count_views += 1;
            $urlModel->update(['count_views' => $urlObject->count_views], $urlObject->id);

            header("HTTP/1.1 301 Moved Permanently");
            header('Location: ' . $urlObject->url);
            exit();
        } else {
            $controllerObj = new ErrorController();
            $controllerObj->pageNotFound();
        }
    }
}