// JavaScript Document
function formReset()
{
	document.calc.reset();
}


function init(){

    //VARIABLES DONDE RECOGEMOS LOS DATOS DE LA CALCULADORA 
    var resultado = document.getElementById('resultado');
    var borrar = document.getElementById('borrar');
    var suma = document.getElementById('suma');
    var resta = document.getElementById('resta');
    var multiplicacion = document.getElementById('multiplicacion');
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
  
  
    //CON LOS EVENTOS ON CLICK RECOGEMOS LOS DATOS DE LOS BTN (AQUI SE PINTAN LAS COSAS EN LA CALCULADORA PONER AQUI EXPRESIONES REGULARES)
  
    uno.onclick = function(e){
  
            resultado.textContent = resultado.textContent  + "1";
  
    }
    dos.onclick = function(e){
      
          resultado.textContent = resultado.textContent  + "2";
     
    }
    tres.onclick = function(e){   
          resultado.textContent = resultado.textContent  + "3";
    }
    cuatro.onclick = function(e){
       
          resultado.textContent = resultado.textContent  + "4";
     
    }
    cinco.onclick = function(e){
      
          resultado.textContent = resultado.textContent  + "5";
      
    }
    seis.onclick = function(e){
       
          resultado.textContent = resultado.textContent  + "6";
     
    }
    siete.onclick = function(e){
       
          resultado.textContent = resultado.textContent  + "7";
     
    }
    ocho.onclick = function(e){
        
          resultado.textContent = resultado.textContent  + "8";
      
    }
    nueve.onclick = function(e){
        
          resultado.textContent = resultado.textContent  + "9";
      
    }
    cero.onclick = function(e){
  
          resultado.textContent = resultado.textContent  + "0";
  
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
        operandoa = resultado.textContent;
        operacion = "+";
        limpiar();
    }
    resta.onclick = function(e){
        operandoa = resultado.textContent;
        operacion = "-";
        limpiar();
    }
    multiplicacion.onclick = function(e){
        operandoa = resultado.textContent;
        operacion = "*";
        limpiar();
    }
    division.onclick = function(e){
        operandoa = resultado.textContent;
        operacion = "/";
        limpiar();
    }
    /*porcentaje.onclick = function(e){
      operandoa = resultado.textContent;
      console.log(operandoa);
      operacion = "%";
    }*/
   /* igual.onclick = function(e){
        operandob = resultado.textContent;
        //resolver();
        entrada = operandoa+operacion+operandob;
        console.log(entrada);
         var valor = calculo(entrada);
         console.log(valor);
         resultado.textContent = valor;
         
    }*/
  
  }

function total()
{
	document.calc.resultado.value = calculo (document.calc.resultado.value)
}

function sct(variable)
{
    if(variable == "sen")
    {
        document.calc.resultado.value = Math.sin(document.calc.resultado.value)
    }
    if(variable == "cos")
    {
        document.calc.resultado.value = Math.cos(document.calc.resultado.value)
    }
    if(variable == "tan")
    {
        document.calc.resultado.value = Math.tan(document.calc.resultado.value)
    }
}

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
                            calculo = parseFloat(valorA) + parseFloat(valorB);
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

        }// fin de funcion calculo()
        
    window.onload = function (){
        init();
    }
