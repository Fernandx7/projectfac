let carrinho = [];
let total = 0;

function adicionarAoCarrinho(produto, preco) {
    carrinho.push({ produto, preco });
    total += preco;
    atualizarCarrinho();
}

function atualizarCarrinho() {
    const lista = document.getElementById('carrinho-lista');
    lista.innerHTML = '';
    carrinho.forEach(item => {
        const li = document.createElement('li');
        li.textContent = `${item.produto} - R$ ${item.preco.toFixed(2)}`;
        lista.appendChild(li);
    });
    document.getElementById('total-carrinho').textContent = total.toFixed(2);
}

function carregarProdutos() {
    fetch('/api/produtos')
        .then(res => res.json())
        .then(produtos => {
            const container = document.getElementById('lista-produtos');
            produtos.forEach(produto => {
                const card = document.createElement('div');
                card.className = 'product-card';
                card.innerHTML = `
                    <img src="${produto.imagem}" alt="${produto.nome}">
                    <h3>${produto.nome}</h3>
                    <p>R$ ${produto.preco.toFixed(2)}</p>
                    <button onclick="adicionarAoCarrinho('${produto.nome}', ${produto.preco})">Comprar</button>
                `;
                container.appendChild(card);
            });
        })
        .catch(err => {
            console.error('Erro ao carregar produtos:', err);
        });
}

window.onload = carregarProdutos;
