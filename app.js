//Invocacion Express
const express = require('express');
const multer = require('multer');
const bodyParser = require('body-parser');
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
        res.render('indexcrud',{
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

// ============================== CRUD

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

// Middleware para el análisis del cuerpo de la solicitud
app.use(bodyParser.urlencoded({ extended: true }));

// Middleware para la carga de archivos
const storage = multer.memoryStorage();

const upload = multer({
  storage: storage
}).single('imagen');

// Ruta para la página de formulario de agregar producto
app.get('/agregar', (req, res) => {
  // Consulta a la base de datos para obtener todas las categorías
  connection.query('SELECT id, nombre FROM categorias', (err, categorias) => {
    if (err) {
      res.render('error', { error: err });
    } else {
      res.render('agregar', { categorias: categorias });
    }
  });
});

// Ruta para manejar la solicitud de agregar producto
app.post('/agregar', (req, res) => {
  upload(req, res, (err) => {
    if (err) {
      res.render('error', { error: err });
    } else {
      const { nombre, descripcion, precio, categoria } = req.body;
      const imagen = req.file.buffer; // Obtener el búfer de la imagen

      const sql = 'INSERT INTO productos (nombre, descripcion, precio, categoria_id, imagen) VALUES (?, ?, ?, ?, ?)';
      const values = [nombre, descripcion, precio, categoria, imagen];

      connection.query(sql, values, (err, result) => {
        if (err) {
          res.render('error', { error: err });
        } else {
          res.redirect('crud');
        }
      });
    }
  });
});

app.get('/editar', (req, res) => {
    // Aquí puedes renderizar la plantilla editar.ejs o redirigir a otra página
    res.render('editar');
  });
  
  // Ruta para mostrar el formulario de edición de un producto específico
  app.get('/editar/:id', (req, res) => {
    const productId = req.params.id;
    // Lógica para obtener los detalles del producto con el ID especificado, luego renderiza la plantilla editar.ejs con los detalles del producto
    connection.query('SELECT * FROM productos WHERE id = ?', [productId], (err, result) => {
      if (err) {
        res.render('error', { error: err });
      } else {
        // También necesitas obtener las categorías para mostrarlas en el formulario de edición
        connection.query('SELECT * FROM categorias', (err, categorias) => {
          if (err) {
            res.render('error', { error: err });
          } else {
            res.render('editar', { producto: result[0], categorias: categorias });
          }
        });
      }
    });
  });
  
  // Ruta para manejar la solicitud POST para editar un producto
  app.post('/editar/:id', (req, res) => {
    upload(req, res, (err) => {
      if (err) {
        res.render('error', { error: err });
      } else {
        const productId = req.params.id;
        const { nombre, descripcion, precio, categoria } = req.body;
        let imagen = req.file ? req.file.buffer : null; // Obtener el búfer de la imagen si se proporciona una nueva imagen
  
        // Si no se proporciona una nueva imagen, mantener la imagen existente en la base de datos
        if (!imagen) {
            connection.query('SELECT imagen FROM productos WHERE id = ?', [productId], (err, result) => {
            if (err) {
              res.render('error', { error: err });
            } else {
              // Usar la imagen existente en la base de datos
              imagen = result[0].imagen;
              updateProduct();
            }
          });
        } else {
          updateProduct();
        }
  
        // Función para actualizar el producto en la base de datos
        function updateProduct() {
          const sql = 'UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, categoria_id = ?, imagen = ? WHERE id = ?';
          const values = [nombre, descripcion, precio, categoria, imagen, productId];
          connection.query(sql, values, (err, result) => {
            if (err) {
              res.render('error', { error: err });
            } else {
              res.redirect('/crud');
            }
          });
        }
      }
    });
  });


// Ruta para manejar la solicitud DELETE para eliminar un producto
app.delete('/eliminar/:id', (req, res) => {
  const productId = req.params.id;
  connection.query('DELETE FROM productos WHERE id = ?', [productId], (err, result) => {
    if (err) {
      res.render('error', { error: err });
    } else {
      res.sendStatus(200);
    }
  });
});

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.post('/agregar_categoria', (req, res) => {
  const { nombre } = req.body;
  // Lógica para agregar la nueva categoría a la base de datos
  connection.query('INSERT INTO categorias (nombre) VALUES (?)', [nombre], (err, result) => {
    if (err) {
      console.error('Error al agregar la categoría:', err);
      res.status(500).send('Error al agregar la categoría');
    } else {
      console.log('Categoría agregada correctamente');
      res.status(200).send('Categoría agregada correctamente');
    }
  });
});


app.listen(3000, (req, res)=>{
    console.log('SERVIDOR ABIERTO EN http://localhost:3000');
})
