<div class="modal" id="login_form" tabindex="-1">
    <form>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Вход</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="Enter_error alert alert-danger d-none">
                    
                    </div>

                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control" name="login" id="login" aria-describedby="emailHelp" required=true>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password" required=true>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="loader11 d-none"></div>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </div>
            </div>
        </div>
    </form>
</div>