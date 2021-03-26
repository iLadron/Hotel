<? require_once DIR_PATH_APP.'/views/header.php'?>

<h1>
    Registration page
</h1>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div>
                <div class="pass_error alert alert-danger d-none" role="alert">Пароли не совпадают</div>
                <div class="server_error alert alert-danger d-none" role="alert"></div>
            </div>


            <form id="regForm" action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" name="name" required="true">
                </div>
                <div class="mb-3">
                    <label for="sname" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" id="sname" name="sname" required="true">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="Telephone" class="form-control" id="phone" name="phone" required="true">
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="login" name="login" required="true">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Почта</label>
                    <input type="email" class="form-control" id="email" name="email" required="true">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password"  required="true">
                </div>
                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Потведрите пароль</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm"  required="true">
                </div>
                <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
            </form>

        </div>
    </div>
</div>
<? require_once DIR_PATH_APP.'/views/footer.php'?>