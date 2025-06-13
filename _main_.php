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
        $conn = new mysqli($servername, $username, $password, $database);
    
    $precoIphone25 = 3299;
    $nomeIphone25 ="Iphone 25 pro ultra max";
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
    $nomeTeclado = "Teclado Gamer";
    $qtdTeclado = "SELECT * FROM produtos WHERE nome_prod = '$nomeTeclado';";
    $consultaTeclado = $conn->query($qtdTeclado);

    $precoHeadset = 499;
    $nomeHeadset =  "Headset Bluetooth";
    $qtdHeadset = "SELECT * FROM produtos WHERE nome_prod = '$nomeHeadset';";
    $consultaHeadset = $conn->query($qtdHeadset);


$sql = "USE ecommerce;";
if ($conn->query($sql) === TRUE) {
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carrinho_json = $_POST['carrinho'];
    $produtos = json_decode($carrinho_json, true);

    if (is_array($produtos)) {
        $contagem = array_count_values($produtos); 

        foreach ($contagem as $nome_prod => $quantidade) {
            $nome_prod = $conn->real_escape_string($nome_prod);
            $quantidade = (int)$quantidade;
            $sql = "UPDATE produtos 
                    SET quantidade = quantidade - $quantidade 
                    WHERE nome_prod = '$nome_prod' AND quantidade >= $quantidade";

            if ($conn->query($sql) && $conn->affected_rows > 0) {}
        }
    }
}

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
                <h3 id="notebook"><?php echo $nomeNotebook?></h3>
                <p>R$ <span id="precoNotebook"><?php echo $precoNotebook?></span> </p>
                 <p>quantidade disponível: <span id="quantidadeNotebook"> <?php echo $consultaNotebook->fetch_assoc()['quantidade'] ?> </span></p>
                <button onclick="adicionar(notebook, precoNotebook)">Comprar</button>
            </div>

            <div class="product-single">
                <img src="" alt="Monitor Gamer">
                <h3 id="monitor"><?php echo $nomeMonitor?></h3>
                <p >R$ <span id="precoMonitor"><?php echo $precoMonitor?></span> </p>
                 <p>quantidade disponível:  <span id="quantidadeMonitor"> <?php echo $consultaMonitor->fetch_assoc()['quantidade'] ?> </span></p>
                <button onclick="adicionar(monitor, precoMonitor)">Comprar</button>
            </div>

            <div class="product-single">
                <img src="" alt="Teclado Gamer">
                <h3 id="teclado"><?php echo $nomeTeclado ?></h3>
                <p >R$ <span id="precoTeclado"><?php echo $precoTeclado ?></span> </p>
                 <p>quantidade disponível:  <span id="quantidadeTeclado"> <?php echo $consultaTeclado->fetch_assoc()['quantidade'] ?> </span></p>
                <button onclick="adicionar(teclado, precoTeclado)">Comprar</button>
            </div>

            <div class="product-single">
                <img src="" alt="Iphone 25 pro ultra max">
                <h3 id="iphone25"><?php echo $nomeIphone25 ?></h3>
                <p>R$ <span id="precoIphone25"> <?php echo $precoIphone25 ?> </span></p>
                 <p>quantidade disponível: <span id="quantidadeIphone25"> <?php echo $consultaIphone->fetch_assoc()['quantidade'] ?> </span></p>
                <button onclick="adicionar(iphone25, precoIphone25);">Comprar</button>
            </div>  

            <div class="product-single">
                <img src="" alt="Headset Bluetooth">
                <h3 id="headset"><?php echo $nomeHeadset ?></h3>
                <p>R$ <span id="precoHeadset"><?php echo $precoHeadset ?></span> </p>
                <p>quantidade disponível: <span id="quantidadeHeadset"> <?php echo $consultaHeadset->fetch_assoc()['quantidade'] ?> </span></p>
                <button onclick="adicionar(headset, precoHeadset);">Comprar</button>
            </div>

        </section>
    <div>
        <h2>Carrinho</h2>
        <ul id="carrinho-lista"></ul>
        <p>Total: R$ <span id="totalCarrinho">0.00</span></p>
       
        <form id="formFinalizar" action="" method="post">
            <input type="hidden" name="carrinho" id="carrinhoInput" value="">
            <button id="botaoFinalizar" type="submit">Finalizar</button> 
        </form>

    </div>
        
    </main>

    <footer>
        <p>&copy; 2025 TechCommerce. Todos os direitos reservados.</p>
    </footer>

<script>
        headset = document.getElementById("headset").textContent;
        iphone25 = document.getElementById("iphone25").textContent;
        notebook = document.getElementById("notebook").textContent;
        monitor = document.getElementById("monitor").textContent;
        teclado = document.getElementById("teclado").textContent;

        // essa parte ta pegando a quantidade de produto *****por enquanto ta inutilizada pq encontrei outra forma de fazer
        // quantidadeNotebook = document.getElementById("quantidadeNotebook").textContent;
        // quantidadeMonitor = document.getElementById("quantidadeMonitor").textContent;
        // quantidadeTeclado = document.getElementById("quantidadeTeclado").textContent;
        // quantidadeIphone25 = document.getElementById("quantidadeIphone25").textContent;
        // quantidadeHeadset = document.getElementById("quantidadeHeadset").textContent;

        precoHeadset = document.getElementById("precoHeadset").textContent;
        precoIphone25 = document.getElementById("precoIphone25").textContent;
        precoNotebook =document.getElementById("precoNotebook").textContent;
        precoMonitor = document.getElementById("precoMonitor").textContent;
        precoTeclado = document.getElementById("precoTeclado").textContent;

document.getElementById('formFinalizar').addEventListener('submit', function(e) {
    const nomesProdutos = carrinho.map(item => item.nome.trim());
    document.getElementById('carrinhoInput').value = JSON.stringify(nomesProdutos);
});



let carrinho = []; 
let estoque2 = [  
    {produto: notebook, QTD: parseFloat(document.getElementById("quantidadeNotebook").textContent)},
    {produto: monitor, QTD: parseFloat(document.getElementById("quantidadeMonitor").textContent)},
    {produto: teclado, QTD: parseFloat(document.getElementById("quantidadeTeclado").textContent)},
    {produto: iphone25, QTD: parseFloat(document.getElementById("quantidadeIphone25").textContent)},
    {produto: headset, QTD: parseFloat(document.getElementById("quantidadeHeadset").textContent)}
]

    function adicionar(nome, precoItem) {
        let quantidadeNoCarrinho = carrinho.filter(item => item.nome === nome).length; 
        let itemEstoque = estoque2.find(item => item.produto === nome);
        if (!itemEstoque) {
            console.warn(`Produto "${nome}" não encontrado no estoque.`);
            return;
        }

    if (quantidadeNoCarrinho < itemEstoque.QTD) {
        carrinho.push({ nome: nome, precoItem: precoItem });
        console.log(`Produto "${nome}" adicionado ao carrinho.`);
    } else {
        console.warn(`Estoque insuficiente para "${nome}".`);
        alert(`Não há mais estoque disponível para o produto "${nome}".`);
    }
        atualizarCarrinho();
    }

    function atualizarCarrinho() {
        let total = 0;    
        const lista = document.getElementById('carrinho-lista');  
        lista.innerHTML = '';    
        for (let nome of carrinho) {   
            const li = document.createElement('li'); 
            li.textContent = ` ${nome.nome} - ${nome.precoItem}`; 
            lista.appendChild(li); 
            total = total + parseFloat(nome.precoItem); 
            
        }
        document.getElementById('totalCarrinho').textContent = total; 
                                                                    
                                                                    
        console.log();
    }

</script>    




</body>
</html>