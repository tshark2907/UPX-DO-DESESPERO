<?php
session_start();
?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.vendas.css">
    <link rel="website icon" type='png' href="/assets/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Itens a venda</title>
</head>
<body>
    <header>
        <a href="/index.php"><img src="/assets/logo.png" class="logo"></a>

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
    <section class="display">
        <h2>Produtos a venda</h2>
        <?php 
        include_once('config.php');
        $sqlTrades = mysqli_query($conexao,"SELECT FROM products WHERE categoria = 'vendas'");
        $results = mysqli_fetch_all($sqlTrades, MYSQLI_ASSOC);
        foreach ($results as $result) {
            echo "
            <a href=\"/produto.html?id_produto=" . $result['id_produto'] . "\">
                <div class=\"product_1\">
                    <img class=\"product_image_1\" alt=\"product_image\" src=\"" . $result['imagem_produto'] . "\">
                    <div class=\"product_title_container_1\">
                        <span class=\"product_title_1\">" . $result['nome_produto'] . "</span>
                        <span class=\"product_price_1\">" . $result['preco_produto'] . " R$</span>
                    </div>
                </div>
            </a>";
        }
        ?>
    </section>
    <footer><span>O projeto Eco Troca faz parte do Projeto de Usina de Projetos Experimentais da Faculdade Newton Paiva.</span></footer>
</body>
<style>
    *{
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
form{
    display: flex;
    flex-direction: row;
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
.produtos{
    margin: 50px auto;
    padding: 10px;
    width: 80%;
    height: 230px;
    background-color: #ffffff;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
.display h2{
    width: 80%;
    padding: 20px;
    background-color: #ffffff;
    margin: 50px auto;
}
.produto{
    width: 200px;
    height: 90%;
    background-color: lightgrey;
}
</style>
</html>