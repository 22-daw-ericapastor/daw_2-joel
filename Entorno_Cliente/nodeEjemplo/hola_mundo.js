
// --CREAR FICHERO--

/*var fs = require('fs');
fs.writeFile('./archivo.txt','linea 1\nlinea 2', error => {
    if(!error){
        console.log("El archivo fue creado");
    }else{
        console.log(error);
    }
})*/



// --LEER FICHERO--
/*
var lectura = require('fs');

lectura.readFile('./archivo.txt',(error,datos)=>{
    if(!error){
        console.log(datos.toString());
    }else{
        console.log(error);
    }
})*/

/*var lectura = require('fs');

lectura.readFile('./archivo.txt', leer);

console.log("ultima linea de ejecucion");

function leer(error, datos){
    if(!error){
        console.log(error);
    }else{
        console.log(datos);
    }
}*/

//levantar un servidor basico
/*var http = require('http');

var servidor = http.createServer((pedido, respuesta) => {
respuesta.writeHead(200,{'Content-Type': 'text/html'});
respuesta.write('<!doctype html><html><head></head><body><h1>hola mundo</h1></body></html>');
respuesta.end();
})

servidor.listen(8000);

console.log("monta servidor");*/

// --MONTURA DE SERVIDOR PARA FICHEROS--
var http = require('http');
var url = require('url');
var fs = require('fs');

const mime = {
    'html': 'text/html',
    'css' : 'text/css',
    'jpg' : 'image/jpg',
    'png' : 'image/png',
    'gif' : 'image/gif',
    'ico' : 'image/x-icon',
    'mp3' : 'audio/mpeg3',
    'mp4' : 'video/mp4'
}

var servidor = http.createServer((pedido, respuesta)=>{

var objetoUrl = url.parse(pedido.url);
var ruta = 'home'+objetoUrl.pathname;
if(ruta == 'home/'){
    ruta = 'home/index.html';
}
    console.log(ruta);
    fs.stat(ruta, error =>{
        if(!error){
            fs.readFile(ruta, (error, contenido)=>{
                if(error){
                    respuesta.writeHead(500,{'Content-Type': 'text/plain'});
                    respuesta.write('DENTRO DEL IF');
                    respuesta.end();
                }else{
                    var vec = ruta.split('.');
                    var extension = vec[vec.length-1];
                    var archivo = mime[extension];
                    respuesta.writeHead(200,{'Content-Type':archivo});
                    respuesta.write(contenido);
                    respuesta.end();
                }
            });
        }else{

            respuesta.writeHead(404,{'Content-Type': 'text/html'});
            respuesta.write('<!doctype html><html><head></head><body><h1>Enlace roto</h1></body></html>');
            respuesta.end();

        }
    })


})

servidor.listen(8000);

console.log('Servidor encendido');





