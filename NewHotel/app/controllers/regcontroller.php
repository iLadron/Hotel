<?php

class regController extends Controller
{
    public function __construct($prefix)
    {
        parent::__construct($prefix);

        $this->view->setTitle("Регистрация и авторизация");
    }

    public function registration()
    {       
        
        $name = htmlspecialchars($_POST['name']);
        $sname = htmlspecialchars($_POST['sname']);
        $phone = htmlspecialchars($_POST['phone']);
        $login = htmlspecialchars($_POST['login']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_confirm = htmlspecialchars($_POST['password_confirm']);

        if ($password_confirm == $password) {

            if ($this->model->loginExist($login)) {
                echo json_encode(array("error" => "Логин уже зарегестрирован"));
                die;
            }

            if ($this->model->emailExist($email)) {
                echo json_encode(array("error" => "Почта уже зарегестрирована"));
                die;
            }

            $data = array(
                "login" => $login,
                "role" => 2,
                "password" => md5($password),
                "name" => $name,
                "email" => $email,
                "sname" => $sname,
                "phone" => $phone
            );

            if ($id = $this->model->registration($data)) {
                User::login(array(
                    "id" => $id,
                     "name" => $data["name"],
                      "role" =>$data["role"],
                      "login"=>$data["login"],
                    ));                
                    echo json_encode(array("error" => ""));
            } else {
                echo json_encode(array("error" => "Произошла ошибка в рег контроллере"));
            };
        } else {
            echo json_encode(array("error" => "Пароли не совпадают"));
        }
    }


    public function login(){
        $data["LOGIN"] = htmlspecialchars($_POST['login']);
        $data["PASSWORD"] = htmlspecialchars($_POST['password']);

        if($this->model->loginExist($data["LOGIN"])){

            if($user = $this->model->authorization($data)){                          
                USER::login($user);
                echo json_encode(array("error" => ""));

            }else{
                echo json_encode(array("error" => "Пароль указан неверно!"));
            }

        }else{
            echo json_encode(array("error" => "Логин не существует"));
        }

    }



    public function logout(){
        User::logout();
        header('Location:'.MAIN_PATH);
    }
}
