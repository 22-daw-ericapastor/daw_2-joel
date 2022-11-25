//FUNCIÓN PARA CAMBIAR DE COLOR LA CALCULADORA 
function cambiaColor (color){
    var color = document.getElementById("opciones").value;
    console.log(color);
   
    if(color == "#F73B20"){
        var a=document.getElementsByClassName("fondo");
        a[0].style.backgroundColor="#F73B20";
    }
    if(color == "#013CF7"){
        var a=document.getElementsByClassName("fondo");
        a[0].style.backgroundColor="#013CF7";
    }
    if(color == "#23AB29"){
        var a=document.getElementsByClassName("fondo");
        a[0].style.backgroundColor="#23AB29";
    }
    }
    //ASIGNAMOS EL CAMBIO DE COLOR CON EL EVENTO ONCHANGE
    document.getElementById("opciones").onchange=cambiaColor;


    //CODIGO DE LA CALCULADORA
  
     var operandoa;
     var operacionesp;
     var operandob;
     var operacion;


    //FALTAN LAS EXPRESIONES REGULARES PARA QUE NO SE PUEDA DIVIDIR PARA 0 Y PARA QUE NO SE PONGA NINGUN SIGNO ANTES QUE EL NUMERO
    //SEPARADOR DE MILES

     //FUNCION PRINCIPAL DE LA CALCULADORA DONDE SE DESARROLLA TODA LA LÓGICA DE LA MISMA
     var totalOperacion=0;
   function init(){

  //VARIABLES DONDE RECOGEMOS LOS DATOS DE LA CALCULADORA 
  var resultado = document.getElementById('resultado');
    var suma = document.getElementById('suma');
  var resta = document.getElementById('resta');
  var multiplicar = document.getElementById('multiplicar');
  var division = document.getElementById('division');
  var porcentaje = document.getElementById('porcentaje');
  var igual = document.getElementById('igual');
  var uno = document.getElementById('uno');
  var dos = document.getElementById('dos');
  var tres = document.getElementById('tres');
  var cuatro = document.getElementById('cuatro');
  var cinco = document.getElementById('cinco');
  var seis = document.getElementById('seis');
  var siete = document.getElementById('siete');
  var ocho = document.getElementById('ocho');
  var nueve = document.getElementById('nueve');
  var cero = document.getElementById('cero');
  var decimal = document.getElementById('decimal');
  /*
  
    FUNCIONES DE LA NUEVA CALCULADORA

  */
  var pi = document.getElementById('pi');
  var numeroE = document.getElementById('simE');
  var raiz = document.getElementById('raiz');
  var dibuja = document.getElementById('dibujar');


  //CON LOS EVENTOS ON CLICK RECOGEMOS LOS DATOS DE LOS BTN (AQUI SE PINTAN LAS COSAS EN LA CALCULADORA PONER AQUI EXPRESIONES REGULARES)

  uno.onclick = function(e){
        console.log(totalOperacion);
          if(resultado.textContent == 'Error'){
              resultado.textContent = resultado.textContent;
          }else{
              
            resultado.textContent = resultado.textContent  + "1";
          }

  }
  dos.onclick = function(e){
    
        if(resultado.textContent == 'Error'){
            resultado.textContent = resultado.textContent;
        }else{
          resultado.textContent = resultado.textContent  + "2";
        }
   
  }
  tres.onclick = function(e){   

        if(resultado.textContent == 'Error'){
            resultado.textContent = resultado.textContent;
        }else{
          resultado.textContent = resultado.textContent  + "3";
        }
  }
  cuatro.onclick = function(e){
     
        if(resultado.textContent == 'Error'){
            resultado.textContent = resultado.textContent;
        }else{
          resultado.textContent = resultado.textContent  + "4";
        }
   
  }
  cinco.onclick = function(e){
    
        if(resultado.textContent == 'Error'){
            resultado.textContent = resultado.textContent;
        }else{
          resultado.textContent = resultado.textContent  + "5";
        }
    
  }
  seis.onclick = function(e){
     
        if(resultado.textContent == 'Error'){
            resultado.textContent = resultado.textContent;
        }else{
          resultado.textContent = resultado.textContent  + "6";
        }
   
  }
  siete.onclick = function(e){
     
        if(resultado.textContent == 'Error'){
            resultado.textContent = resultado.textContent;
        }else{
          resultado.textContent = resultado.textContent  + "7";
        }
   
  }
  ocho.onclick = function(e){
      
        if(resultado.textContent == 'Error'){
            resultado.textContent = resultado.textContent;
        }else{
          resultado.textContent = resultado.textContent  + "8";
        }
    
  }
  nueve.onclick = function(e){
      
        if(resultado.textContent == 'Error'){
            resultado.textContent = resultado.textContent;
        }else{
          resultado.textContent = resultado.textContent  + "9";
        }
    
  }
  cero.onclick = function(e){

        if(resultado.textContent == 'Error'){
            resultado.textContent = resultado.textContent;
        }else{
          resultado.textContent = resultado.textContent  + "0";
        }

  }
  pi.onclick = function(e){
      
      if(resultado.textContent == 'Error'){
        resultado.textContent = resultado.textContent;
      }else{
          var pi = parseFloat(Math.PI);
          console.log(pi);
          resultado.textContent = resultado.textContent + pi;
      }
  }
  numeroE.onclick = function(e){
      console.log('dentro de E');
      if(resultado.textContent == 'Error'){
          resultado.textContent = resultado.textContent;
      }else{
          var nume = parseFloat(Math.E);
          console.log(nume);
          resultado.textContent = resultado.textContent + nume;
      }
  }
  decimal.onclick = function(e){
    var coma = resultado.textContent;
    //poner una expresion regular para que no se pueda poner una coma primero
    if(coma.includes(".")){
        resultado.textContent = resultado.textContent;
    }else{
        if(coma.length == 0){ //sustituir esto por una expresion regular){

        }else{
          resultado.textContent = resultado.textContent + ".";
        }
        
    }
    
  }
  suma.onclick = function(e){

    if(resultado.textContent == 'Error'){
        resultado.textContent = resultado.textContent;
    }else{
        operandoa = resultado.textContent;
         operacion = "+";
        console.log(operacion);
        limpiar();
    }
     
      
  }
  resta.onclick = function(e){
      if(resultado.textContent == 'Error'){
          resultado.textContent = resultado.textContent;
      }else{ 
      operandoa = resultado.textContent;
      operacion = "-";
      limpiar();
      }
  }
  multiplicar.onclick = function(e){
      if(resultado.textContent == 'Error'){
          resultado.textContent = resultado.textContent;

      }else{
        operandoa = resultado.textContent;
        operacion = "*";
        limpiar();
      }
      
  }
  division.onclick = function(e){
      if(resultado.textContent == 'Error'){
        resultado.textContent = resultado.textContent;
      }else{
        operandoa = resultado.textContent;
        operacion = "/";
      limpiar();
      }
      
  }
  /*
   
        FUNCIONES PREDIFINIDAS POR LA CLASE MATH
   */
  porcentaje.onclick = function(e){
      if(resultado.textContent == 'Error'){
        resultado.textContent = resultado.textContent;
      }else{
        operandoa = resultado.textContent;
        console.log(operandoa);
        operacion = "%";
        resultado.textContent = parseFloat(operandoa)/100;
      }
  
  }
  raiz.onclick = function(e){

    if(resultado.textContent == 'Error'){
        resultado.textContent = resultado.textContent;
      }else{
        operandoa = resultado.textContent;
        console.log(operandoa);
        operacion = "√";
        resultado.textContent = parseFloat(Math.sqrt(operandoa));
      }

  }
  igual.onclick = function(e){
      operandob = resultado.textContent;
      entrada = operandoa+operacion+operandob;
    
      console.log(operandob);
       var valor = calculo(entrada);
       console.log(valor);
       resultado.textContent = valor;
       if(resultado.textContent == 'Infinity'){
           resultado.textContent = "Error";
       }
       if(resultado.textContent == 'NaN'){
           resultado.textContent = 'Error';
       }
       
  }

}


    //CREO LAS FUNCIONES LIMPIAR Y RESETEAR

    function limpiar(){
  resultado.textContent = "";
}
function borrar(){
  resultado.textContent = "";
  operandoa = 0;
  operandob = 0;
  operacion = "";
}

function retro(){
    var borrar = resultado.textContent;
    if(borrar == 'Error'){
        resultado.textContent = resultado.textContent;
    }else{

    cifras=borrar.length; 
         br=borrar.substr(cifras-1,cifras)
         borrar=borrar.substr(0,cifras-1)
         if (borrar=="") {borrar="";} 
         if (br==".") {coma=0;} 
         resultado.innerHTML=borrar; 
    }
}

//FUNCION QUE PONE EL MISMO NUMERO PULSADO PERO CON SIGNO NEGATIVO

function opuesto() { 
    var numero = resultado.textContent;
    console.log(numero);
    nx=Number(numero); //convertir en número
    nx=-nx; //cambiar de signo
    x=String(nx); //volver a convertir a cadena
    resultado.textContent=x; //mostrar en pantalla.*/
}

//variables globales para guardar los datos en memoria

function guardarMemoria(){
    /*else if(valor=='mc'){//borrar la memoria
        memoria='';
        letraM.innerHTML='';//quitar la M
        console.log('Memoria vacia');
    
    }else if(valor=='mr'){//mostrar en pantalla el numero almacenado en memoria
        var cadena=contarCaracteres(memoria);
        entrada.innerHTML=cadena;
        captura='';
        console.log('Leyendo memoria:'+memoria);
        
    }else if(valor=='ms'){	//guardar el numero en pantalla en la memoria
        if(entrada.innerHTML!=0 && entrada.innerHTML!='' ){
            if(entrada.innerHTML.length>17){
                var no=entrada.innerHTML.length-17;
                var cadena=entrada.innerHTML.substring(0,entrada.innerHTML.length-no);
            }else{
                cadena=entrada.innerHTML;
            }
            memoria=cadena;
            letraM.innerHTML='M';
            console.log('Numero en la memoria:'+memoria);
        }
    
    }else if(valor==='m+'){//sumar el numero en pantalla al almacenado en la memoria
        var res=calculo(parseFloat(memoria)+parseFloat(entrada.innerHTML));
        var cadena=ajustarCaracteres(res);//ajustar la cadena para gusrdar maximo 17 caracteres en la memoria
        memoria=cadena;
    
    }else if(valor=='m-'){//restar el numero en pantalla al almacenado en la memoria
        var res=calculo(memoria-entrada.innerHTML)
        var cadena=ajustarCaracteres(res);//ajustar la cadena para gusrdar maximo 17 caracteres en la memoria
        memoria=cadena;*/
}

//ASIGNAMOS A LAS FUNCIONES INDEPENDIENTES UN BTN-> BORRAR, RETRO, OPUESTO
document.getElementById('inverso').onclick = opuesto;
document.getElementById('limpiar').onclick = borrar;
document.getElementById('borrar').onclick = retro;



//FUNCION DONDE REALIZAMOS LAS OPERACIONES
function calculo(entrada) {
        
                // declaracion de variables usadas
                var valorA=0;
                var valorB=0;
                var calculo =0;
                var operador='';
                var ciclo =true;
                var paso=0;
                var cadena =entrada; // entrada de operacion de calculo
                var expNum = /[\d|.|]+/; // exp para numeros int / flotante
                var expOper = /[-|\|+|-|*|//]/; // exp para operador + - * /

                do {
                    paso++;

                    // pone ultimo valor calculado para volver a operar 
                    if (paso>1) {
                        cadena = calculo.toString().concat(cadena);
                    } 

                    // 1) PARA el primer valor
                    valorA= cadena.match(expNum); // tomar numero encontrado por exp de numero
                    if (valorA==null) { break;  }
                    cadena= cadena.replace(valorA, ""); // quitar numero encontrado
                    ciclo = (valorA.length-length==0)? false : true;  // si no se consigue el primer numero se sale
             
                    // 2) PARA el segundo valor
                    valorB= cadena.match(expNum); // tomar numero encontrado por exp de numero
                    cadena= cadena.replace(valorB, ""); // quitar numero encontrado

                    // 3) Para el operador
                    operador= cadena.match(expOper); // tomar numero encontrado por exp de numero
                    cadena= cadena.replace(operador, ""); // quitar numero encontrado
                        // si no se consigue operador se sale del ciclo.
                        if (operador==null) {  break; } 
                           
                    operador=operador.toString(); // convierte operador en string para el switch
                    // calculo de operacion artimeticas
                    switch (operador) {
                        case '+':
                            console.log(valorB);
                            calculo = parseFloat(valorA) + parseFloat(valorB);
                            totalOperacion = calculo;

                        break;
                        case '-':
                            calculo = parseFloat(valorA) - parseFloat(valorB);
                        break;
                        case '*':
                            calculo = parseFloat(valorA) * parseFloat(valorB);
                        break;
                        case '/':
                            calculo = parseFloat(valorA) / parseFloat(valorB);
                        break;
                        default:
                            calculo=null;
                            ciclo = false; // si falla el calculo se sale;
                        break;
                    }
              
                // si no hay mas contenido se sale del ciclo
                if (cadena.length<=1) {
                    ciclo = false;
                }
                    
                } while (ciclo);

                 return calculo; // salida de calculo

        }  // fin de funcion calculo()

        function dibujar(){
	
            //añadir a mi funcion de calcular que calcule por coseno y por seno y tangente 
            
            document.getElementById('plano').innerHTML='<canvas id="myCanvas" width="300" height="300" style="border:1px solid #d3d3d3;" Your browser does not support the HTML5 canvas tag.</canvas>'; 
            if(document.calc.resultado.value=='sin(X)')
            {
                X=-50;
                y=Math.sin(X)*-1
                var c = document.getElementById("myCanvas");
                var ctx = c.getContext("2d");
                ctx.translate(150,150)
                ctx.moveTo(X,y);
                for(X=-50; X<50;X++)
                        {
                y= calculo (Math.sin(X))*-1;
                ctx.lineTo(X,y);
                ctx.stroke();
                }
            }
            else if(document.calc.resultado.value=='tan(X)')
            {
                X=-50;
                y=Math.tan(X)*-1
                var c = document.getElementById("myCanvas");
                var ctx = c.getContext("2d");
                ctx.translate(150,150)
                ctx.moveTo(X,y);
                for(X=-50; X<50;X++)
                        {
                y= calculo (Math.tan(X))*-1;
                ctx.lineTo(X,y);
                ctx.stroke();
                }
            }
            else if(document.calc.resultado.value=='cos(X)')
            {
                X=-50;
                y=Math.cos(X)*-1
                var c = document.getElementById("myCanvas");
                var ctx = c.getContext("2d");
                ctx.translate(150,150)
                ctx.moveTo(X,y);
                for(X=-50; X<50;X++)
                        {
                y= calculo (Math.cos(X))*-1;
                ctx.lineTo(X,y);
                ctx.stroke();
                }
            }
            else
            {
                X=-50;
                y=calculo (document.calc.resultado.value)*-1
                var c = document.getElementById("myCanvas");
                var ctx = c.getContext("2d");
                ctx.translate(150,150)
                ctx.moveTo(X,y);
                for(X=-50; X<50;X++)
                        {
                y=calculo (document.calc.resultado.value)*-1
                ctx.lineTo(X,y);
                ctx.stroke();
                
                         }
            }
                         
                 
            }


//ESTAMOS ASIGNANDO MEDIANTE ESTE EVENTO QUE EL CODIGO DE LA CALCULADORA SE CARGUE EN EL BODY

document.getElementById("inicio").onload = init;
