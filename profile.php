<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.profile.css">
    <link rel="website icon" type='png' href="/assets/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Perfil | Eco Troca</title>
</head>
<body>
    <header>
            <a href="/index.html"><img class="logo" src="/assets/logo.png"></a>
            <form id="searchForm">
                <input type="text" name="search" class="search">
                <label id="search_button" for="search" class="material-symbols-outlined">search</label>

            <script>
                const searchForm = document.getElementById('searchForm');
                const searchButton = document.getElementById('search_button');

                searchButton.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default form submission
                const searchTerm = document.querySelector('.search').value;
                window.location = `pesquisar.php?search=${searchTerm}`; // Redirect to pesquisar.php with search term as query parameter
                });
        </script>
        </form>
        <div class="profile_area">
            <?php 
            if(!isset($_SESSION['email']) == true){
                echo "
                <a href=\"/login.php\"><span class=\"material-symbols-outlined\">person_add</span></a>
                <a href=\"/login.php\"><span class=\"material-symbols-outlined\">login</span></a>";
            } else{
                echo "
                <span>Olá " . $SESSION['username'] . "!</span>
                <button>Sair</button>";
            }?>
            
        </div>
    </header>
    <main>
        <?php
        echo "
            <span>Nome de usuário: <span id=\"name_placeholder\">".$_SESSION['username']."</span></span>
            <span>Email: <span id=\"email_placeholder\">".$_SESSION['email']."</span></span>"
        ?>
    </main>
    <section class="display">
        <h2>Seus produtos em venda</h2>
        <div class="produtos yours">
        <?php 
    include_once('config.php');

    $id_usuario = mysqli_real_escape_string($conexao, $_SESSION['id_usuario']);

    $listProducts = mysqli_query($conexao, "SELECT * FROM products WHERE dono = '$id_usuario' LIMIT 20");
    $results = mysqli_fetch_all($listProducts, MYSQLI_ASSOC);
    
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
        </div>
    </section>
    <section class="display">
        <h2>Produtos que você curtiu</h2>
        <div class="produtos recomended">
        <?php 
    include_once('config.php');

    $id_usuario = mysqli_real_escape_string($conexao, $_SESSION['id_usuario']);

    $listProducts = mysqli_query($conexao, $sql = "SELECT *
    FROM liked_products AS lp
    JOIN products AS p ON lp.product_id = p.id
    WHERE lp.user_liked = '" . mysqli_real_escape_string($conexao, $_SESSION['username']));
    
    $results = mysqli_fetch_all($listProducts, MYSQLI_ASSOC);
    
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
        </div>
    </section>
    <section class="display">
        <h2>Recomendados</h2>
        <div class="produtos recomended">
            <div class="produto"></div>
            <div class="produto"></div>
            <div class="produto"></div>
            <div class="produto"></div>
            <div class="produto"></div>
        </div>
    </section>
    <footer>
        <span>O Eco Troca é um projeto promovido pela Unidade de Projetos Experimentais da faculdade Newton Paiva. Pode ser levado em frente e entrar em operação no futuro, mas no momento possuí motivos educacionais.</span>
    </footer>
</body>
<style>
    body{
    background: #005C53;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-size: 16px;
}
main{
    margin: 50px auto;
    width: 40vw;
    background-color: #ffffff;
    padding:20px;
    display:flex;
    align-items: center;
    flex-direction: column;
    gap: 10px;
    border-radius:10px;
}
.profile_pic{
    width: 70px;
    height: 70px;
    border: 1px solid #D6D58E;
}
.produtos{
    margin: 20px auto;
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
    background-color: #042940;
    margin: 0 auto;
    color: #D6D58E;
}
.produto{
    width: 200px;
    height: 90%;
    background-color: lightgrey;
}
header{
    background-color: #042940;
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
#search_button{
    border: 1px solid #5ACC54;
    color: #5ACC54;
}
.sandwich{
    color: #5ACC54;
}
.logo{
    width: 50px;
    height: 50px;
    border-radius: 50%;
}
footer{
    padding: 20px;
    background-color: #042940;
    color:#D6D58E;
    text-align: center;
}
</style>
</html>