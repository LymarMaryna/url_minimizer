<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Core\Service;
use App\Models\Url;

class IndexController extends Controller
{
    public function fetch()
    {
        $this->view->render('main');
    }

    public function ajaxMinifyUrl(){
        $url = $_POST['url'];
        $lifetime = $_POST['lifetime'];

        if(!filter_var($url, FILTER_VALIDATE_URL)) {
            $this->view->renderJson(['error' => 'Enter correct URL']);
            exit();
        }

        $hash = Service::hashUrl($url);
        $data = [
            'url' => $url,
            'hash' => $hash
        ];

        if(!empty($lifetime)) {
            $date = new \DateTime();
            $date->modify("+1 {$lifetime}");
            $date_end = $date->format('Y-m-d h:i:s');
            $data['end_date'] = $date_end;
        }
        $urlModel = new Url();

        if($url_id = $urlModel->insert($data)) {
            $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'? 'https' : 'http';
            $root_url = $protocol.'://'.rtrim($_SERVER['HTTP_HOST']);
            $this->view->renderJson(['url' => $root_url . '/' . $hash]);
        } else {
            $this->view->renderJson(['error' => 'OOPS! Something went wrong. Try again later.']);
        }
    }

}