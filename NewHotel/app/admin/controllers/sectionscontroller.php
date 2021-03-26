<?php


class SectionsController extends Controller
{
    public function __construct($prefix)
    {
        parent::__construct($prefix);
        $this->view->setTitle("Категории для админа");
    }



    public function index()
    {
        if ($sections = $this->model->getList('sections')) {
            $this->view->arResult["ITEMS"] = $this->getTreeForArray($sections);
        } else {
            $this->view->arResult["ITEMS"] = array();
        }

        parent::index();
    }




    public function add()
    {
        $data = array(
            'name' => htmlspecialchars($_POST["section_name"]),
            'code' => htmlspecialchars($_POST["section_code"]),
            'parent_id' => htmlspecialchars($_POST["parent_section"]) == 0 ? null : htmlspecialchars($_POST["parent_section"]),
            'depth_level' => is_null($_POST["depth_level"]) ? 0 : htmlspecialchars($_POST["depth_level"])
        );

        if (strlen($data["name"]) >= 2 && strlen($data["code"] >= 2)) {

            if ($id = $this->model->add($data)) {
                //var_dump("ge");
                echo json_encode(array("error" => false));
            } else {
                echo json_encode(array("error" => true));
            }
        } else {
            echo json_encode(array("error" => true));
        }
    }



    public function edit(){


        $data = array(
            'id' => htmlspecialchars($_POST["id"]),
            'name' => htmlspecialchars($_POST["section_name"]),
            'code' => htmlspecialchars($_POST["section_code"]),
            'parent_id' => htmlspecialchars($_POST["parent_section"]) == 0 ? null : htmlspecialchars($_POST["parent_section"]),
            'depth_level' => is_null($_POST["depth_level"]) ? 0 : htmlspecialchars($_POST["depth_level"])
        );

        if (strlen($data["name"]) >= 2 && strlen($data["code"] >= 2 && $data['id']>0)) {

            if ($this->model->edit($data)) {
                echo json_encode(array("error" => false));
            } else {
                echo json_encode(array("error" => true));
            }
        } else {
            echo json_encode(array("error" => true));
        }


    }


    public function del()
    {
        $data = array(
            "id" => htmlspecialchars((int) $_POST["id"])
        );

        if ($data["id"] > 0) {
            if ($this->model->del("sections", "id", $data["id"])) {

                echo json_encode(array('success' => "true"));
            } else {
                echo json_encode(array('success' => "false"));
            }
        }
    }


    public function getEditFormById($id)
    {
        $data = $this->model->getById($id, 'sections');
        $this->view->section = $data;

        $sections = $this->model->getList('sections');
        $this->view->all_sections = $this->getTreeForArray($sections);


        $this->view->render(strtolower(get_class($this)), "edit_form");


        
    }

}
