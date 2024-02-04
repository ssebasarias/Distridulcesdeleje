const express = require("express");
const mysql = require('mysql');

const app = express();

// Configurar conexión a la base de datos
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'distridulcesdeleje'
});

connection.connect();

// Configurar motor de plantillas EJS
app.set('view engine', 'ejs');

// Middleware para servir archivos estáticos
app.use(express.static('public'));

// Ruta para manejar las solicitudes GET a la página de principal
app.get('/', (req, res) => {
    res.render('index'); 
});


// Ruta para manejar las solicitudes GET a la página de productos
app.get('/productPage', (req, res) => {
    // Consultar productos y sus categorías desde la base de datos
    const query = `
        SELECT productos.*, categorias.nombre AS categoria_nombre
        FROM productos
        JOIN categorias ON productos.categoria_id = categorias.id
    `;
    connection.query(query, (error, results) => {
        if (error) throw error;
        // Organizar los productos por categoría
        const productosPorCategoria = {};
        results.forEach(producto => {
            if (!productosPorCategoria[producto.categoria_nombre]) {
                productosPorCategoria[producto.categoria_nombre] = [];
            }
            productosPorCategoria[producto.categoria_nombre].push(producto);
        });
        // Renderizar la vista 'index' y pasar los datos de los productos por categoría
        res.render('productPage', { productosPorCategoria });
    });
});



// Iniciar servidor
const port = 3000;
app.listen(port, () => {
    console.log(`Servidor iniciado en http://localhost:${port}`);
});
