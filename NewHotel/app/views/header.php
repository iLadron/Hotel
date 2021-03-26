<!DOCTYPE html>

<html>

<head>

    <script>
    
    window.BASE_DIR_AJAX = "<?=BASE_DIR_AJAX?>";
    </script>

    <title><?= $this->getTitle(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link href="<?= TEMPLATE_PATH ?>/style.css?<?rand()?>" rel="stylesheet" />
    <script src="<?= TEMPLATE_PATH ?>/script.js?<?rand()?>"></script>
    <link href="<?=MAIN_PATH?>app/preloader.css?<?rand()?>" rel="stylesheet" />

    <?if (isset($this->addjs)):?>
    <script type="text/javascript" src="<?= $this->addjs ?>" ?<?= rand() ?>></script>
    <?endif?>

    <?if (isset($this->addcss)):?>
    <script type="text/javascript" src="<?= $this->addcss ?>" ?<?= rand() ?>></script>
    <?endif?>



    <head>

    <body>
    <!--
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Просто сайт</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= MAIN_PATH ?>">Главная</a>
                        </li>
                        <?if(User::isLogin()):?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= MAIN_PATH ?>lk/"><?= User::getLogin() ?></a>
                        </li>
                        <?endif;?>

                        <li class="nav-item">

                            <?if(User::isLogin()):?>
                            <a class="nav-link" href="<?= MAIN_PATH ?>reg/logout/">Выход</a>

                            <?else:?>
                            <a class="nav-link login_link" href="javascript:;" onclick="openDialogLogin()">Вход</a>
                            <?endif;?>
                        </li>
                        <?if(!User::isLogin()):?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= MAIN_PATH ?>/reg/">Регистрация</a>
                        </li>
                        <?endif;?>
                        <?if(User::isAdmin()):?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= MAIN_PATH ?>/admin/">Admin's panel</a>
                        </li>
                        
                        <?endif;?>

                    </ul>
                </div>
            </div>
        </nav>
    -->