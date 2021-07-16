    <form class="form-login" action="" method="post">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-light">In</span>                    
                <span class="font-weight-bold mx-2">N'</span>                    
                <span class="font-weight-light">Out</span>
                <i class="icofont-runner-alt-1 ml-2"></i>                                      
            </div>
            <div class="card-body">
                <?php include(TEMPLATE_PATH.'/messages.php') ?>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" 
                    class="form-control <?= $errors['email'] ? 'is-invalid' : ''; ?> " 
                    value="<?=$email ?>" placeholder="Digite seu e-mail" autofocus>
                    <div class="invalid-feedback">
                        <?= $errors['email']?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="password" id="senha" 
                    class="form-control <?= $errors['password'] ? 'is-invalid' : ''; ?>" 
                    placeholder="Digite sua senha">
                    <div class="invalid-feedback">
                        <?= $errors['password']?>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-primary">Entrar</button>
            </div>
        </div>
    </form>
