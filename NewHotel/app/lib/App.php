<?php

class App
{
    public function __construct($prefix = '/')
    {
        

        $get_url = isset($_GET['url']) ? htmlspecialchars($_GET['url']) : false;

        if ($get_url) {
            $url = explode("/", rtrim($get_url, "/"));
        } else {
            $url[] = "index";
        }

        $file_controller = __DIR__ . '/..'.$prefix.'controllers/' . $url[0] . 'controller.php';
        //var_dump($file_controller);
        if (file_exists($file_controller)) {
            require_once $file_controller;

            $class_name = $url[0] . "Controller";

            if (class_exists($class_name)) {
                $controller = new $class_name($prefix);
                
                if (isset($url[1])) {
                    if(method_exists($controller,$url[1])){
                        if(isset($url[2])){                            
                            $controller->{$url[1]}($url[2]);
                        }else{
                            $controller->{$url[1]}();
                        }
                    }else{
                        self::ShowError('Error! Method  does not exist!!!');
                    }
                } else {
                    $controller->index();
                }
            } else {
                self::ShowError('Error! controller Class does not exist!!!');
            }
        } else {
            self::ShowError('Error! controller does not exist!!!');
        }
    }

    public static function ShowError($error)
    {
        echo $error;
    }

    static function dump($param)
    {
        echo '<pre>';
        var_dump($param);
        echo '<pre>';
    }

    static function getCurPage($params = false){
        $url = $_SERVER["REQUEST_URI"];
        if(!$params && strpos($url,"?")){
            $url = substr($url, 0, strpos($url,"?"));
        }

        $url = str_replace("index.php","",$url);

        return $url;

    }



}
