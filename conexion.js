const mysql = require("mysql");

const conexion = mysql.createConnection({
    host: "localhost",
    database: "distridulcesdeleje",
    user: "root",
    password: ""
});

// Función para conectar a la base de datos
function conectarDB() {
    conexion.connect(function(err) {
        if (err) {
            throw err;
        } else {
            console.log("Conexión exitosa a la base de datos");
        }
    });
}

// Función para desconectar de la base de datos
function desconectarDB() {
    conexion.end();
}

// Función para ejecutar consultas SQL genéricas
function ejecutarConsulta(query, mensajeExito) {
    conexion.query(query, function(error, resultado) {
        if (error) {
            throw error;
        } else {
            console.log(mensajeExito);
        }
    });
}

// Función para mostrar todos los productos
function mostrarProductos() {
    const query = "SELECT * FROM productos";
    ejecutarConsulta(query, "Lista de productos:");
}

// Función para insertar un nuevo producto
function insertarProducto(nombre, descripcion, precio, idCategoria, activo) {
    const query = `INSERT INTO productos (nombre, descripcion, precio, id_categoria, activo) VALUES ('${nombre}', '${descripcion}', ${precio}, ${idCategoria}, ${activo})`;
    ejecutarConsulta(query, "Producto insertado correctamente");
}

// Función para actualizar un producto
function actualizarProducto(id, descripcion) {
    const query = `UPDATE productos SET descripcion = '${descripcion}' WHERE id = ${id}`;
    ejecutarConsulta(query, "Producto actualizado correctamente");
}

// Función para eliminar un producto
function eliminarProducto(id) {
    const query = `DELETE FROM productos WHERE id = ${id}`;
    ejecutarConsulta(query, "Producto eliminado correctamente");
}

module.exports = {
    conectarDB,
    desconectarDB,
    mostrarProductos,
    insertarProducto,
    actualizarProducto,
    eliminarProducto
};
