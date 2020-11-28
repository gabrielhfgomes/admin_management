<?php
    /*
    * App Core Class
    * Create URL & load core controller
    * URL FORMAT - /controller/method/params
    */

    class Core
    {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = [];
        protected $resourceActions = ["add", "edit", "delete"];

        public function __construct()
        {
            $url = $this->getUrl();
            
            if(isset($url[2]) && !in_array($url[2], $this->resourceActions)) {
                if (file_exists('../app/controllers/' . ucwords($url[2]) . '.php')) {
                    $this->currentController = ucwords($url[2]);
                    unset($url[2]);
                }

                require_once '../app/controllers/' . $this->currentController . '.php';

                $this->currentController = new $this->currentController;

                if (isset($url[3])) {
                    if (method_exists($this->currentController, $url[3])) {
                        $this->currentMethod = $url[3];
                        unset($url[3]);
                    }
                }

                if (isset($url[4])) {
                    if (method_exists($this->currentController, $url[4])) {
                        $this->currentMethod = $url[4];
                        unset($url[4]);
                    }
                }
            } else {
                if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                    $this->currentController = ucwords($url[0]);
                    unset($url[0]);
                }

                require_once '../app/controllers/' . $this->currentController . '.php';

                $this->currentController = new $this->currentController;

                if (isset($url[1])) {
                    if (method_exists($this->currentController, $url[1])) {
                        $this->currentMethod = $url[1];
                        unset($url[1]);
                    }
                }

                if (isset($url[2])) {
                    if (method_exists($this->currentController, $url[2])) {
                        $this->currentMethod = $url[2];
                        unset($url[2]);
                    }
                }
            }

            // Get params
            $this->params = $url ? array_values($url) : [];
            //Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function  getUrl()
        {
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                return $url;
            }
        }
    }
