const FtpSrv = require ( 'ftp-srv' );

const servidor_ftp = new FtpSrv (
opciones = { 
    url: 'ftp://127.0.0.1:21',
      pasv_min: 1024,
      pasv_max: 65535,
      pasv_url: null,
      anonymous: false,
      file_format: 'ls',
      blacklist: ['RNTO'],
      whitelist: [],
      tls: false,
      timeout: 20,
      greeting: ["Bienvenido JOEL"]


}

);

servidor_ftp.on('login', ({connection, username, password}, resolve) => {
    //CUANDO CARGAS FICHEROS
    connection.on('RETR', (error, filePath) => { 
      if(error){
        console.log(error);
      }
      console.log(filePath);
     });
     //CUANDO DESCARGAS FICHEROS
     connection.on('STOR', (error, fileName) => { 
      if(error){
        console.log(error);
      }
        
      
      console.log(fileName);
     });
    if(username == 'joel' && password == 'joel'){
        console.log("Usuario logueado correctamente");
        resolve({root: '/2ºDAW/Entorno_Cliente/nodeEjemplo/home'});
    }else{
       console.log(401,"Usuario o contrasena incorrectos")
    }

});


servidor_ftp.on ( 'client-error', (context) =>
{
  console.log("Error => " + context);
});

servidor_ftp.listen()
.then(() =>
{
  console.log ('Server levantado con la ip 127.0.0.1');
});

