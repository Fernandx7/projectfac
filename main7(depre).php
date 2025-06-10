<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechCommerce</title>

    
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f2f2f2;
    color: #333;
}

header {
    background-color: #1f1f1f;
    color: #fff;
    padding: 20px;
    text-align: center;
}

nav ul {
    display: flex;
    justify-content: center;
    list-style: none;
    margin-top: 10px;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

main {
    padding: 40px 20px;
    text-align: center;
}

.products {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    margin-top: 20px;
}

.product-single {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 250px;
    transition: transform 0.2s;
}

.product-single:hover {
    transform: scale(1.05);
}

.product-single img {
    width: 100%;
    border-radius: 5px;
}

.product-single h3 {
    margin: 15px 0 10px;
}

.product-single p {
    font-size: 1.1em;
    margin-bottom: 15px;
}

button {
    background-color: #0078D7;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #005fa3;
}

footer {
    background-color: #1f1f1f;
    color: #fff;
    text-align: center;
    padding: 15px 0;
    margin-top: 380px;
}

#carrinho-lista {   
    list-style: none;
    padding: 0;
    margin-top: 20px;
    text-align: left;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

</style>

<body>
    
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";    
        $database = "ecommerce";
        $conn = new mysqli($servername, $username, $password);

    
    $precoIphone25 = 3299;
    $nomeIphone25 = "Iphone 25 pro ultra max";
    $qtdIphone = "SELECT * FROM produtos WHERE nome_prod = '$nomeIphone25';";
    $consultaIphone = $conn->query($qtdIphone);

    $precoNotebook= 5999;
    $nomeNotebook = "Notebook Gamer";
    $qtdNotebook = "SELECT * FROM produtos WHERE nome_prod = '$nomeNotebook';";
    $consultaNotebook = $conn->query($qtdNotebook);

    $precoMonitor = 2999;
    $nomeMonitor = "Monitor Gamer";
    $qtdMonitor = "SELECT * FROM produtos WHERE nome_prod = '$nomeMonitor';";
    $consultaMonitor = $conn->query($qtdMonitor);

    $precoTeclado = 400;
    $nomeTeclado = "Teclado gamer";
    $qtdTeclado = "SELECT * FROM produtos WHERE nome_prod = '$nomeTeclado';";
    $consultaTeclado = $conn->query($qtdTeclado);

    $precoHeadset = 499;
    $nomeHeadset =  "Headset Bluetooth";
    $qtdHeadset = "SELECT * FROM produtos WHERE nome_prod = '$nomeHeadset';";
    $consultaHeadset = $conn->query($qtdHeadset);



// Select the ecommerce database
$sql = "USE ecommerce;";
if ($conn->query($sql) === TRUE) {
    echo "Database selected successfully.<br>";
}

// Now update the product quantity
$sql = "UPDATE produtos SET quantidade = 70 WHERE nome_prod = 'Headset bluetooth';";
if ($conn->query($sql) === TRUE) {
    echo "Product quantity updated successfully.";
} else {
    echo "Error updating product: " . $conn->error;
}

$conn->close();

    ?>



    <header>
        <h1>Tech Store</h1>
        <nav>
            <ul>
                <li><a href="#">Início</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Produtos em destaque</h2>
        <section class="products" id="lista-produtos">
            <div class="product-single">
                <img src="" alt="Notebook Gamer">
                <h3 id="notebook"><?php echo $nomeNotebook?> </h3>
                <p id="precoNotebook">R$ <?php echo $precoNotebook?></p>
                 <p>quantidade disponível: <?php echo $qtdNotebook ?><span id="quantidadeNotebook"></span></p>
                <button>Comprar</button>
            </div>
            <div class="product-single">
                <img src="" alt="Monitor Gamer">
                <h3 id="monitor"><?php echo $nomeMonitor?></h3>
                <p id="precoMonitor">R$ <?php echo $precoMonitor?></p>
                 <p>quantidade disponível: <?php echo $qtdMonitor ?> <span id="quantidadeMonitor"></span></p>
                <button>Comprar</button>
            </div>
            <div class="product-single">
                <img src="" alt="Teclado Gamer">
                <h3 id="teclado"> <?php echo $nomeTeclado ?> </h3>
                <p id="precoTeclado">R$ <?php echo $precoTeclado ?> </p>
                 <p>quantidade disponível: <?php echo $qtdTeclado ?> <span id="quantidadeTeclado"></span></p>
                <button onclick="">Comprar</button>
            </div>
            <div class="product-single">
                <img src="" alt="Iphone 25 pro ultra max">
                <h3 id="iphone25"><?php echo $nomeIphone25 ?> </h3>
                <p id="precoIphone">R$ <?php echo $precoIphone25 ?></p>
                 <p>quantidade disponível: <?php echo $qtdIphone ?><span id="quantidadeIphone"></span></p>
                <button onclick="adicionarCarrinho();">Comprar</button>
            </div>  
            <div class="product-single">
                <img src="" alt="Headset Bluetooth">
                <h3 id="headset"> <?php echo $nomeHeadset ?> </h3>
                <p id="precoHeadset">R$ <?php echo $precoHeadset ?> </p>
                <p>quantidade disponível: <span id="quantidadeHeadset"></span></p>
                <button onclick="adicionarCarrinho();">Comprar</button>
            </div>
        </section>
    <div>
        <h2>Carrinho</h2>
        <ul id="carrinho-lista"></ul>
        <p>Total: R$ <span id="totalCarrinho">0.00</span></p>
        <button id="botaoFinalizar" value="submit">Finalizar</button>
    </div>
        
    </main>

    <footer>
        <p>&copy; 2025 TechCommerce. Todos os direitos reservados.</p>
    </footer>


<?php 



?>
     
<script>

     // const comandoConsultar = connection.query(`SELECT quantidade FROM produtos WHERE nome_prod = 'Headset Bluethooth';`)


        function finalizartudo(nome){
            nome = document.getElementById("headset").textContent;
            console.log(`Finalizando compra do produto: ${nome}, preço: ${precoHeadset}`);
        }


        function pegarINFO(nome, preco){
            nome = document.getElementById("headset").textContent;
            preco = document.getElementById("precoHeadset").textContent;
            console.log(nome, preco);
        }

        // essa parte ta pegando o nome do produto
        headset = document.getElementById("headset").textContent;
        iphone25 = document.getElementById("iphone25").textContent;
        notebook = document.getElementById("notebook").textContent;
        monitor = document.getElementById("monitor").textContent;
        teclado = document.getElementById("teclado").textContent;

        // essa parte ta pegando o preco do produto
        precoHeadset = document.getElementById("precoHeadset").textContent;
        precoIphone25 = document.getElementById("precoIphone").textContent;
        precoNotebook =document.getElementById("precoNotebook").textContent;
        precoMonitor = document.getElementById("precoMonitor").textContent;
        precoTeclado = document.getElementById("precoTeclado").textContent;

    </script>
</body>
</html>