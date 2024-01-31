// conecta con la base de datos
const { error } = require("console");
let mysql = require("mysql");

let conexion = mysql.createConnection({
    host: "localhost",
    database: "distridulcesdeleje",
    user: "root",
    password: ""
});

// verifica conexion con la base de datos
conexion.connect(function (err) {
    if (err){
        throw err;
    }else {
        console.log("conexion exitosa");
    }
});

// Mostrar datos
const productos = "SELECT * FROM productos";
conexion.query(productos, function(error,lista){
    if(error){
        throw error;
    } else {
        console.log(lista);
    }
});

// Insertar datos
const insertar = "INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `id_categoria`, `activo`) VALUES (NULL, 'nuevo', 'fdsghsdfgj', '4517546', '1', '1');";
conexion.query(insertar, function(error,rows){
    if(error){
        throw error;
    } else {
        console.log("se insertó correctamente");
    }
})

// Modificar datos
const actualizar = "UPDATE `productos` SET `descripcion` = 'nueva descripcion' WHERE id = 14;";
conexion.query(actualizar, function(error,rows){
    if(error){
        throw error;
    } else {
        console.log("se actualizó correctamente");
    }
})

// Eliminar un dato
const eliminar = "DELETE FROM productos WHERE `productos`.`id` = 16";
conexion.query(actualizar, function(error,rows){
    if(error){
        throw error;
    } else {
        console.log("se eliminó correctamente");
    }
})

conexion.end();