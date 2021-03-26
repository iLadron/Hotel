<?php

class Controller{

    protected $view;
    protected $name_model;


    public function __construct($prefix) {
        $this->view = new View($prefix);
        $this->name_model = $this->getBaseNameByController().'model';

        if (file_exists(DIR_PATH_APP.'/models'.$prefix.$this->name_model.'.php')){
            require_once DIR_PATH_APP.'/models'.$prefix.$this->name_model.'.php';
            $this->model = new $this->name_model;
           
        }else{
            
        }
    
    }


    public function index(){
        $this->view->render(strtolower(get_class($this)));
    }

    private function getBaseNameByController(){
        $name = get_class($this);
        $first_index = strpos($name,'Controller');        
        return substr($name,0,$first_index);
    }


    private function getBaseNameByModel(){
        $name = get_class($this);
        $first_index = strpos($name,'Model');        
        return substr($name,0,$first_index);
    }


    protected function getTreeForArray($data, $level = 0, $pid=0, $ipid="parent_id" ,$in ="name", $sep="-&nbsp"){
        $result = array();
        foreach($data as $row){

            if($row[$ipid] == $pid){

                $row[$in] = str_repeat($sep, $level).$row[$in];
                $_res = $this->getTreeForArray($data,$level + 1, $row['id']);
                $row['count_children'] = count($_res);
                $result[] = $row;
                $result = array_merge($result, $_res);
            }
        }
        return $result;
    }


}



?>