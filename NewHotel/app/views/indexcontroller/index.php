<? require_once DIR_PATH_APP.'/views/header.php'?>

<header id="header" class="fixed-top">
        <nav class="navbar  navbar-expand-lg navbar-light ">
            <div class="container">
               
                <a href="#" class="navbar-brend">HOTELS VIEW co.</a>
                <button class="navbar-toggler " type="button" 
                data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mr-auto mb-2 ">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Отели</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id ="navbarDrop" role="button" data-toggle="dropdown" aria-expanded="false"
                            >Личный кабинет</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDrop">
                                <li>
                                    <a href="" class="dropdown-item">Войти</a>
                                </li>
                                <li>
                                    <a href="" class="dropdown-item">Зарегистрироваться</a>
                                </li>



                            </ul>
                        </li>
                        
                    </ul>
                </div>
                
            </div>
        </nav>
    </header>
<? require_once DIR_PATH_APP.'/views/footer.php'?>