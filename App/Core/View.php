<?php


namespace App\Core;


class View
{
    public $template = 'index';
    public $content;
    private $data;

    public function render($view, $data = [])
    {
        $this->data = $data;
        if (is_array($data)) {

            extract($data);
        }

        $viewFile = 'App/Views/';

        if (is_null($this->template)) {

            $viewFile .= $view . '.php';

        } else {
            $content = $viewFile . $view . '.php';
            $viewFile .= $this->template . '.php';
            $this->content = $content;
        }

        if (file_exists($viewFile)) {

            require $viewFile;

        } else {

            echo "view not found";

        }
    }

    public function renderJson($data)
    {
        $this->template = null;

        header("Content-type:application/json");

        echo json_encode($data);
    }

    public function content()
    {

        if (is_array($this->data)) {

            extract($this->data);
        }

        require $this->content;
    }
}