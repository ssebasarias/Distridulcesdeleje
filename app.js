//Invocacion Express
const express = require('express');
const app = express();

//seteamos urlencoded para capturar los datos del formulario
app.use(express.urlencoded({extended:false}));
app.use(express.json());

//invocacion dotenv
const dotenv = require('dotenv');
dotenv.config({path:'./env/.env'});

//directorio public 
app.use('/resources', express.static('public'));
app.use('/resources', express.static(__dirname + '/public'));

//motor plantillas ejs
app.set('view engine', 'ejs');

//invocacion a bcryptjs
const bcryptjs = require('bcryptjs');

//var de session
const session = require('express-session');
app.use(session({
    secret: 'secret',
    resave: true,
    saveUninitialized:true
}));

//Invocacion modulo conexion de la BD
const connection = require('./database/db');
const { error } = require('console');

app.get('/login', (req, res)=>{
    res.render('login');
})

app.get('/register', (req, res)=>{
    res.render('register');
})

//registracion
app.post('/register', async (req, res)=>{
    const user = req.body.user;
    const name = req.body.name;
    const rol = req.body.rol;
    const pass = req.body.pass;
    let passwordHaash = await bcryptjs.hash(pass, 8);
    connection.query('INSERT INTO users SET ?', {user:user, name:name, rol:rol, pass:passwordHaash}, async(error, results)=>{
        if(error) {
            console.log(error);
        }else{
            res.render('register',{
                alert: true,
                alertTitle: "Registration",
                alertMessage: "Sucessful Registration!",
                alertIcon:'success',
                showConfirmButton: false,
                time:1500,
                ruta:''
            })
        }
    })
})

//Autoenticacion

app.post('/auth', async (req, res)=>{
    const user = req.body.user;
    const pass = req.body.pass;
    let passwordHaash = await bcryptjs.hash(pass,8);
    if(user && pass){
        connection.query('SELECT * FROM users WHERE user = ?', [user], async (error, results)=>{
            if(results.length == 0 || !(await bcryptjs.compare(pass,results[0].pass))) {
                res.render('login',{
                    alert: true,
                    alertTitle: "Error",
                    alertMessage: "Usuario Y/O password incorrectos",
                    alertIcon:'error',
                    showConfirmButton: true,
                    time:1500,
                    ruta:'login'
                })
            }else {
                req.session.loggedin = true;
                req.session.name = results[0].name
                res.render('login',{
                    alert: true,
                    alertTitle: "Conexion exitosa",
                    alertMessage: "¡Login Correcto!",
                    alertIcon:'success',
                    showConfirmButton: false,
                    time:1500,
                    ruta:''
                })
            }
        })
    } else {
        res.render('login',{
            alert: true,
            alertTitle: "Advertencia",
            alertMessage: "Por favor ingresa un usuario y/o password",
            alertIcon:'warning',
            showConfirmButton: false,
            time:false,
            ruta:'login'
        })
    }
})

//Autenticar pages

app.get('/', (req, res)=>{
    if(req.session.loggedin) {
        res.render('index',{
            login: true,
            name: req.session.name
        })
    }else{
        res.render('index', {
            login: false,
            name: ''
        })
    }
})

//Logout

app.get('/logout', (req, res)=>{
    req.session.destroy(()=>{
        res.redirect('/')
    })
})

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

app.get('/crud', (req, res) => {
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
        res.render('crud', { productosPorCategoria });
    });
});

app.listen(3000, (req, res)=>{
    console.log('SERVIDOR ABIERTO EN http://localhost:3000');
})
