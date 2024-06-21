<?php
    namespace App\Controller;
    use League\Plates\Engine;

    class Controller{

        protected $views;

        public function __construct()
        {
            $this->views = new Engine(VIEWS_DIR);
        }

        public function render($pageName, array $data = []){
            echo $this->views->render($pageName, $data);
        }
    }
?>