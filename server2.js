import mysql from 'mysql2/promise';

const connection = await mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'ecommerce'
});

// export function consultaQNTD(){
//   const quantidadeteste fields = connection.query(
//     `SELECT quantidade FROM produtos WHERE nome_prod = 'Headset BLuetooth';`
//   );
// }


try {
  const [quantidadeteste] = await connection.query(
    `SELECT quantidade FROM produtos WHERE nome_prod = 'Headset BLuetooth';`
  );
  console.log(quantidadeteste);
} catch (err) {
  console.log(err);
}

finalizar();