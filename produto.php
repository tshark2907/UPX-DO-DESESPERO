<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.produto.css">
    <link rel="website icon" type='png' href="/assets/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Produto</title>
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
                    <span>Olá" . $SESSION['username'] . "!</span>
                    <button>Sair</button>";
                }?>
                
            </div>
        </a>
    </header>
    <?php
    include_once('config.php');
    $id_produto = $_GET['id_produto'];
    $sqlProduto = mysqli_query($conexao, "SELECT FROM produtos WHERE product_id = $id_produto");
    $sqlUsuario = mysqli_query($conexao, "
    SELECT telefone
    FROM usuarios
    JOIN produtos ON dono = id_usuario
    WHERE product_id = '" . mysqli_real_escape_string($conexao, $id_produto) . "'
    AND telefone IS NOT NULL
");
    echo "<main>
    <div class=\"product_exposer\">
        <h2>".$sqlProduto['product_name']."</h2>
        <img src=\"" . $sqlProduto['product_image'] . " class=\"product_image\">
    </div>
    <div class=\"product_description\">
        <span>".$sqlProduto['product_description']."</span>
        <h2>".$sqlProduto['product_price']."</h2>
    </div>
    <a href=\"https://wa.me/".$sqlUsuario."\"><button class=\"buy\">Comprar</button></a>
</main>" 
?>
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
main{
    width: 80%;
    height: 400px;
    margin: 50px auto;
    display: flex;
    flex-direction: column;
    gap: 30px;
    align-items: center;
    justify-content: center;
    background-color: #ffffff;
    padding: 20px;
}
.product_exposer{
    display: flex;
    flex-direction: column;
    gap: 10px;
    justify-content: space-between;
    align-items: center;
    width: 50%;
}
.product_description{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
.product_image{
    width: 200px;
    height: 150px;
    border: 1px solid rgba(0,61,76,1);
    padding: 10px;
}
.buy{
    padding: 10px;
    background: linear-gradient(90deg, rgba(0,61,76,1) 0%, rgba(223,143,132,1) 100%);
    color: white;
    border: transparent;
    border-radius: 10px;
    cursor: pointer;
}
</style>
</html>