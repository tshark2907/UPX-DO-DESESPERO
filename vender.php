<?php
session_start();
 if(isset($_POST['submit']) and !empty($_POST['nome_produto'])){
    include_once('config.php');
     $nomeProduto = $_POST['nome_produto'];
     $descricao = $_POST['descricao_produto'];
     $image_produto = $_POST['imagem_produto'];
     $preco = $_POST['preco_produto'];
     $telefone = $_SESSION['telefone'];
     $categoria = 'venda';
 
     $result = mysqli_query($conexao,"INSERT INTO produtos(nomeProduto,descricaoProduto,imagemProduto,telefone,categoria,preco) VALUES ('$nomeProduto','$descricao','$image_produto',$telefone,$categoria,$preco
     
     )");
 } else {
     header('Location: vender.php');
 };
 if(isset($_GET['submit']) and !empty($_GET['search'])){
    include_once('config.php');
    $pesquisar = $_GET['search'];

    $searchQuery = mysqli_query($conexao,"SELECT (*) FROM usuarios,produtos WHERE name = '$pesquisar'");
    
    $results = mysqli_fetch_all($searchQuery);
 }
 else{
    header('Location: doacao.php');
 }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.vender.css">
    <link rel="website icon" type='png' href="/assets/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Vender no Eco Troca</title>
</head>
<body>
    <header>
        <a href="/index.html"><img src="/assets/logo.png" class="logo"></a>
        <form id="searchForm">
        <input type="text" name="search" class="search">
        <label id="search_button" for="search" class="material-symbols-outlined">search</label>

        <script>
            const searchForm = document.getElementById('searchForm');
            const searchButton = document.getElementById('search_button');

            searchButton.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default form submission
            const searchTerm = document.getElementById('search').value;
            window.location = `pesquisar.php?search=${searchTerm}`; // Redirect to pesquisar.php with search term as query parameter
            });
        </script>
        </form>
        <a href="/profile.html">
        <div class="profile_area">
            <?php 
            if(!isset($_SESSION['email']) == true){
                echo "
                <a href=\"/login.php\"><span class=\"material-symbols-outlined\">person_add</span></a>
                <a href=\"/login.php\"><span class=\"material-symbols-outlined\">login</span></a>";
            } else{
                echo "
                <span>Olá $username!</span>
                <button>Sair</button>";
            }?>
            
        </div>
        </a>
    </header>
    <main>
        <h2>Vender produto</h2>
        <form class="product_form" action='vender.php' method='POST'>
            <div class="field">
                <label for="nome_produto">Nome:</label>
                <input type="text" name="nome_produto" id="nome_produto">
            </div>
            <div class="field">
                <label for="preco_produto">Preço:</label>
                <input type="text" name="preco_produto" id="preco_produto">
            </div>
            <div class="field">
                <label for="descricao_produto">Descrição:</label>
                <input type="text" name="descricao_produto" id="descricao_produto">
            </div>
            <div class="field image">
                <input type="text" name="imagem_produto" id="imagem_produto">
                <label id="image_input" for="imagem_produto">Insira o link da imagem do produto</label>
            </div>
            <button type='submit' action='submit'>
            Vender
            </button>
        </form>
    </main>
    <footer><span>O projeto Eco Troca faz parte do Projeto de Usina de Projetos Experimentais da Faculdade Newton Paiva.</span></footer>
</body>
<style>*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-size: 16px;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
body{
    background: linear-gradient(90deg, rgba(0,61,76,1) 0%, rgba(223,143,132,1) 100%);
}
header{
    background-color: #ffffff;
    padding: 20px;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;   
}
.logo{
    width: 50px;
    height: 50px;
}
footer{
    width: 100%;
    padding: 20px;
    background-color: white;
    text-align: center;
    position: fixed;
    bottom: 0;
}
.profile_area{
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
}
#search_button{
    border: 1px solid rgba(0,61,76,1);
    cursor: pointer;
}
a{
    text-decoration: none;
}
.search_form{
    display: flex;
    flex-direction: row;
}
main{
    background-color: #ffffff;
    width: 80%;
    margin: 50px auto;
    gap: 10px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.field{
    gap: 30px;
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}
#imagem_produto{
    display: none;
}
.image{
    justify-content: center;
}
button{
    padding: 10px;
    border: transparent;
    background: linear-gradient(90deg, rgba(0,61,76,1) 0%, rgba(223,143,132,1) 100%);
    color: white;
    border-radius: 10px;
    cursor: pointer;
}
#image_input{
    border: 1px solid rgba(0,61,76,1);
    padding: 10px;
    border-radius: 10px;
    cursor:pointer;
}</style>
</html>