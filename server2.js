import mysql from 'mysql2/promise';

const connection = await mysql.createConnection({
    host: '127.0.0.1',
    user: 'root_teste',
    password: 1234,
    database: 'teste'
})

try {
    const [results, fields] = await connection.query(
        'SHOW TABLES;'
    );

    console.log(results);
    console.log(fields);
} catch (err){
    console.log(err);
}