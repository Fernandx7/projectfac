import mysql from 'mysql2/promise';
const connection = await mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'ecommerce'
});

// Num_Headset = connection.query(
//   `SELECT quantidade FROM produtos WHERE nome_prod = 'Headset bluetooth';`
// )



try {
  const [quantidadeteste] = await connection.query(
    // `SELECT quantidade FROM produtos WHERE nome_prod = 'Monitor Gamer';`
    
      `UPDATE produtos SET quantidade = 50 WHERE nome_prod = 'Headset bluetooth';`
  );
  console.log(quantidadeteste);
} catch (err) {
  console.log(err);
}

export async function teste1(){

  const quantidade = await connection.query(
  `SELECT * FROM produtos;`
  )
  
  console.log(quantidade);
} 

teste1();

await connection.end();