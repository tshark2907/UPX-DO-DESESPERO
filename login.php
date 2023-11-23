<?php 
if(isset($_POST['submit'])){
    print_r($_POST['name']);
    print_r($_POST['email']);
    print_r($_POST['password']);
    print_r($_POST['user_phone']);
};
?>
<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entre ou crie sua conta</title>
    <link rel="stylesheet" href="/style.login.css">
    <link rel="website icon" type='png' href="/assets/logo.png">
    <script defer src="/script.login.js"></script>
</head>
<body>
    <main>
        <div class="operation">
            <button class="choose_operation" id="select_create">Criar uma nova conta</button>
            <button class="choose_operation" id="select_login">Entrar</button>
        </div>
        <form class="inputs" action='login.php' method='POST'>
            <div class="field_holder create" id="name_field">
                <label for="name">Insira seu nome: </label>
                <input name="name" id="user_name" type="text" placeholder="Nome">
            </div>
            <div class="field_holder">
                <label for="user_email">Insira seu email: </label>
                <input name='email' id="user_email" type="email" placeholder="exemplo@exemplo.com">
            </div>
            <div class="field_holder">
                <label for="password create" id="password_create">Crie uma senha com pelo menos 8 caracteres: </label>
                <label for='password login' id="password_login">Insira sua senha: </label>
                <input name="password" id="user_pass" type="password" placeholder="********">
            </div>
            <div class="field_holder create">
                <label for="user_phone">Insira seu telefone: </label>
                <input name='user_phone' id="user_phone" type="text" placeholder="(XX)XXXXX-XXXX">
            </div>
        </form>
        <a href="#"><button id='account_create' class="action create_account inputs" action='submit'>Criar conta</button></a>
        <a href="#"><button id="account_login" class="action log_in inputs">Entrar</button></a>
    </main>
</body>
</html>