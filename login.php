<?php 
if(isset($_POST['submit']) and !empty($_POST['email']) and !empty($POST['senha'])){
   /* include_once('config.php');*/
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $telefone = $_POST['user_phone'];

    /*$result = mysqli_query($conexao,"INSERT INTO usuarios(nome,email,senha,telefone) VALUES ('$nome','$email','$senha','$telefone')");*/
} else {
    header('Location: login.php');
};
?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entre ou crie sua conta</title>
    <link rel="website icon" type='png' href="/assets/logo.png">
</head>
<body>
    <main>
        <div class="operation">
            <button class="choose_operation" id="select_create">Criar uma nova conta</button>
            <button class="choose_operation" id="select_login">Entrar</button>
        </div>
        <form id="main_form" class="inputs" action='login.php' method='POST'>
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
            <input name="submit" id='account_create' type="submit" class="action create_account inputs" action='SUBMIT'>Criar conta</input>
            <input name="submit" id="account_login" type="submit" class="action log_in inputs" action='SUBMIT'>Entrar</input>
        </form>
        
        
        <script>         
        let createAcc = document.querySelector('#select_create');
        let loginAcc = document.querySelector('#select_login');
        let inputs = document.getElementsByClassName('inputs');
        let mainForm = document.querySelector('#main_form')

let createAccountItems = {
    name: document.querySelector('#name_field'),
    password: document.querySelector('#password_create'),
    account: document.querySelector('#account_create')
}
let loginAccountItems = {
    password: document.querySelector('#password_login'),
    login: document.querySelector('#account_login')
}

for(let element of inputs){
    element.classList.add('hidden');
}

createAcc.addEventListener('click',() => {
    mainForm.setAttribute('method','POST');
    for(let element of inputs){
        element.classList.remove('hidden');
    }
    for(let prop in loginAccountItems){
        loginAccountItems[prop].classList.add('hidden');
    }
    for(let prop in createAccountItems){
        createAccountItems[prop].classList.remove('hidden')
    }
    loginAcc.classList.remove('active');
    createAcc.classList.add('active');
})
loginAcc.addEventListener('click',() => {
    mainForm.setAttribute('method','GET');
    for(let element of inputs){
        element.classList.remove('hidden');
    }
    for(let prop in loginAccountItems){
        loginAccountItems[prop].classList.remove('hidden');
    }
    for(let prop in createAccountItems){
        createAccountItems[prop].classList.add('hidden')
    }
    loginAcc.classList.add('active');
    createAcc.classList.remove('active');
    return false;
})
        </script>
        <style>
            *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 16px;
}
body{
    background: linear-gradient(90deg, rgba(0,61,76,1) 0%, rgba(223,143,132,1) 100%);
}
main{
    background-color: white;
    width: 50%;
    height: 60%;
    margin: 50px auto;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
}
.operation{
    display: flex;
    flex-wrap: wrap;
    gap:30px;
}
.choose_operation{
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.active{
    background: linear-gradient(90deg, rgba(0,61,76,1) 0%, rgba(223,143,132,1) 100%);
    color: white;
}
.field_holder{
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin: 10px;
}
input{
    padding: 10px;
}
.action{
    background: linear-gradient(90deg, rgba(0,61,76,1) 0%, rgba(223,143,132,1) 100%);
    color: white;
    padding: 10px;
    border: 1px solid transparent;
    border-radius: 5px;
    cursor: pointer;
}
.action:hover{
    background: white;
    border: 1px solid rgba(0,61,76,1);
    color: rgba(0,61,76,1);
}
.hidden{
    display: none;
}
        </style>
    </main>
</body>
</html>