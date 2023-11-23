<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta property="og:image" src="/assets/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Troca - Início</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type='png' href="/assets/logo.png">
</head>
<body>
    <header>
        <img class='logo' src="/assets/logo.png" alt="logo">
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
        <div class="profile_area">
            <?php 
            if(!isset($_SESSION['email']) == true){
                echo "
                <a href=\"/login.php\"><span class=\"material-symbols-outlined\">person_add</span></a>
                <a href=\"/login.php\"><span class=\"material-symbols-outlined\">login</span></a>";
            } else{
                echo "
                <span>Olá ".$_SESSION."!</span>
                <button>Sair</button>";
            }?>
            
        </div>
    </header>
    <nav>
        <ul>
            <li><span class="material-symbols-outlined navbar_icons">shopping_cart</span><a href="/vendas.html">Comprar</a></li>
            <li><span class="material-symbols-outlined navbar_icons">sell</span><a href="/vender.html">Vender</a></li>
            <li><img class="navbar_icons" src="/assets/trade-pink.png" alt="icone_troca"><a href="/trocas.html">Trocas</a></li>
            <li><img class="navbar_icons" src="/assets/donate-pink.png" alt="icone_doacao"><a href="/doacao.html">Doações</a></li>
        </ul>
    </nav>
    <section class="banner_area">
        <div class="banner_container">
            <span class="material-symbols-outlined chevron_left">chevron_left</span>
            <div class="banner">
                <a href='./vendas.php'><img class="banner_1" src="/assets/banner_1.jpg"></a>
                <a href='./trocas.php'><img class="banner_2" src="/assets/banner_2.jpg"></a>
                <a href='./doacoes.php'><img class="banner_3" src="/assets/banner_3.jpg"></a>
            </div>
            <span class="material-symbols-outlined chevron_right">chevron_right</span>
        </div>
        <div class='banner_dots'>
            <ul class="dot_container">
                <li><div class="dot #1"></div></li>
                <li><div class="dot #2"></div></li>
                <li><div class="dot #3"></div></li>
            </ul>
        </div>
    </section>
    <section class="showcase_area">
        <div class="showcase_container">
            <h2>Destaques na sua área</h2>
            <div class="showcase_1">
            <?php 
            include_once('config.php');
                $listProducts = mysqli_query($conexao,"SELECT (*) FROM liked_products WHERE usuario = $username LIMIT 20;");
                $results = mysqli_fetch_all($listProducts);
                foreach($results as $result){
                   echo "
                   <a href=\"/produto.html?id_produto='" . $result['id_produto'] . "'\">
                    <div class=\"product_1\">
                        <img class=\"product_image_1\" alt=\"product_image\" src=\"" . $result['imagem_produto'] . "\">
                        <div class=\"product_title_container_1\">
                            <span class=\"product_title_1\">" . $result['nome_produto'] . "</span>
                            <span class=\"product_price_1\">" . $result['preco_produto'] . "\R$\"</span>
                        </div>
                    </div>
                </a>"; 
                }
             ?>
            </div>
        </div>
    </section>
    <footer>
        <span>Este projeto foi criado para a UPX2 do curso de Análise e Desenvolvimento de Sistemas da faculdade Newton Paiva. Para mais informações sobre o projeto, acesse nosso Github e páginas oficiais.</span>
    </footer>
</body>
<style>
    *{
    margin:0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background-color: #1c8ca0;
    font-family: 'Roboto', sans-serif;
}
header{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 30px;
    background: rgb(0,61,76);
    background: linear-gradient(90deg, rgba(0,61,76,1) 0%, rgba(223,143,132,1) 100%);
    z-index: 1; 
}
.logo{
    width: 70px;
    height: 70px;
}
.profile_area{
    width: 100px;
    height: 50px;
    display: flex;
    justify-content: space-evenly;
    gap: 10px;
    align-items: center;
}
.profile_area span{
    transform: scale(1.3);
    color: #04647c;
    border: 1px solid #04647c;
    border-radius: 5px;
    padding: 5px;
    transition: all 0.5s;
}
.profile_area span:hover{
    background-color: #04647c;
    color: #f2c1b0;
    border: 1px solid #f2c1b0;
}
.search{
    padding: 10px;
    background-color: #1c8ca0;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
    border-radius: 5px;
}
#search_text{
    padding: 10px;
    border-radius: 5px;
    border: none;
}
.search_icon{
    padding: 10px;
    border: 1px solid white;
    border-radius: 5px;
    background-color: rgb(0,61,76);
    color: white;
    transition: all 0.5s;
}
.search_icon:hover,.search_icon:focus{
    background-color: #df8f84;
    color: white;
    border: 1px solid rgb(0,61,76);
}
nav{
    background-color: rgb(0,61,76);
    border-top: 1px solid #df8f84;
    z-index: 3;
}
nav ul{
    display: flex;
    justify-content: space-evenly;
    list-style: none;
}
nav ul li{
    padding: 10px;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 5px;
    color: #df8f84;
}
a{
    text-decoration: none;
    color:#f2c1b0;
}
.navbar_icons{
    width: 25px;
}
.banner_area{
    width: 90%;
    border-top: 1px solid #df8f84;
    border-radius: 10px;
    padding: 20px;
    background-color: #04647c;
    margin: 30px auto;
}
.banner_container{
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    align-items: center;
}
.banner{
    border: 1px solid #BCDB9C;
    border-radius: 10px;
    display: flex;
    flex-direction: row;
    width: fit-content;
    overflow: hidden;
}
.chevron_left,.chevron_right{
    padding: 10px;
    color: #df8f84;
    background-color: #04647c;
    border: 1px solid #df8f84;
    border-radius: 5px;
    margin: 10px;
}
.banner_dots{
    width: 30%;
    margin: 20px auto 0 auto;
}
.dot_container{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    list-style:none;
}
.dot{
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #df8f84;
    border: 1px solid white;
}
.showcase_area{
    width: 90%;
    padding: 20px;
    margin: 0 auto 20px auto;
    background-color: #04647c;
    border-radius: 10px;
    color: #f2c1b0;
}
.showcase_1{
    margin-top: 10px;
    padding: 10px;
    width: 100%;
    height: 170px;
    background-color: rgb(0,61,76);
    border-radius: 10px;
    overflow-y: hidden;
    display: flex;
    gap: 10px;
}
.product_1{
    width: 120px;
    height: 150px;
    border-radius: 5px;
    background-color: #1c8ca0;
    border: 1px solid #f2c1b0;
    position: relative;
}
.product_image_1{
    height: 100%;
    width: auto;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
}
.product_title_container_1{
    width: 100%;
    height: 40px;
    background-color: rgb(0,61,76);
    border: 1px solid #f2c1b0;
    border-radius: 5px;
    position: absolute;
    bottom: 0;
    padding: 5px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.product_title_container_1 span{
    font-size: 0.7rem;
    color: #f2c1b0;
}
footer{
    background: rgb(0,61,76);
    background: linear-gradient(90deg, rgba(0,61,76,1) 0%, rgba(223,143,132,1) 100%);
    padding: 20px;
    color: #FFFFFF;
}

</style>
</html>