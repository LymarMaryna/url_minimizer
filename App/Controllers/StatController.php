<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\Url;

class StatController extends Controller
{
    public function fetch()
    {
        $res = [];

        if ($_POST && isset($_POST['url'])) {
            $url = $_POST['url'];
            $res['url'] = $url;
            $url_array = parse_url($url);
            if (isset($url_array['path'])) {
                $hash = ltrim($url_array['path'], '/');
                $urlModel = new Url();
                $urlObject = $urlModel->findOne($hash);

                if ($urlObject) {
                    $res['count'] = $urlObject->count_views;
                    $res['data'] = $urlObject->last_modify;
                } else {
                    $res['error'] = "Can't find url";
                }
            } else {
                $res['error'] = "OOPS! Wrong url.";
            }
        }

        $this->view->render('stat', $res);
    }
}