// importar librerias
const express = require("express");

// objetos para llamar metodos expres
const app = express();

// configuraciones
app.set("view engine", "ejs");

app.get("/",function(req,res){
    res.render("index");
});

// ruta de archivos estaticos
app.use(express.static("public"));

// configurar puerto par servidor local
app.listen(3000,function(){
    console.log("El puerto es http://localhost:3000");
});
