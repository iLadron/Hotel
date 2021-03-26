<?
    require_once __DIR__."/../app/lib/Bootstrap.php";


    if (User::isLogin() && User::isAdmin()){
        $app = new App('/admin/');
    }else{
        header("Location: ".MAIN_PATH);
    }



?>
