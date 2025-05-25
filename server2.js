const mysql = require('mysql2');
numDeNotebooknoCarrinho;
numDeIphonenoCarrinho;
numDeMonitoresnoCarrinho;
numDeTecladosnoCarrinho;
numDeHeadsetnoCarrinho;

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'ecommerce'
});

connection.connect((err) => {
  if (err) throw err;
  console.log('CONECTOU CARALHOOOOOOO');
});


function atualizarBanco(nome_Prod, novaQuantidade){
  const comandoAtualizarSql = 'UPDATE produtos SET quantidade = quantidade - ' + numDeNotebooknoCarrinho + ' WHERE nome_Prod = ' + nome_Prod;
}