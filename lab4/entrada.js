function generaTabla(){
  var number = window.prompt("Please enter a number", 10);
  var strHTML = "";
  strHTML += "<table ><thead><tr><th>n</th><th>n²</th><th>n³</th></tr></thead><tbody>";
  for(var i = 0; number>=i;i++){
    strHTML+="<tr><td>"+i+"</td>";
    strHTML+="<td>"+(i*i)+"</td>";
    strHTML+="<td>"+(i*i*i)+"</td></tr>";
  }
    strHTML+="</tbody></table>";
  document.getElementById('tabla').innerHTML= strHTML;
}

function sumaRandom(){
  var x = Math.floor((Math.random() * 100) + 1);
  var y = Math.floor((Math.random() * 100) + 1);
  var start = new Date().getTime();
  var resultado = window.prompt(x + " " + y, );
  var elapsed = new Date().getTime() -start;
  if(resultado==(x+y)){
    alert("correcto, timepo: " + elapsed + "ms");
  }
  else alert("incorrecto, timepo: " + elapsed +"ms");
}

function contador(arreglo){
  var positivos=0,negativos=0,ceros=0;
  console.log(arreglo.length);
  for(var i=0;i<arreglo.length;i++){
    if(arreglo[i]>0){
      positivos++;
    }
    if(arreglo[i]==0){
      ceros++;
    }
    else negativos++;
  }
  return ("Positivos: " + positivos+ " Negativos: " + negativos + " Ceros: " + ceros);
}

function pruebaContador(){
  var strHTML = "";
  var prueba=[[1,3,5,7,8,0],[0,3,6,7,8,1,-3,0],[-2,-9,-8,8,0,0,0,0]]
  strHTML += "<table ><thead><tr><th>Arreglo</th><th>Resultado</th></tr></thead><tbody>";
  for(var i = 0; i<3;i++){
    strHTML+="<tr><td>"+prueba[i]+"</td>";
    strHTML+="<td>"+contador(prueba[i])+"</td></tr>";
  }
    strHTML+="</tbody></table>";
  document.getElementById('tabla2').innerHTML= strHTML;

}

function promedio(matriz){
  var promedio=0;
  var str="";
  console.log(matriz.length);
  for(var i=0;matriz.length>i;i++){
    for(var j=0;j<matriz[i].length;j++){
      promedio = promedio + matriz[i][j];
    }
    promedio = promedio/matriz[i].length;
    str=+promedio + " ";
    promedio=0;
  }
  return str;
}

function pruebaPromedio(){
  var strHTML = "";
  var prueba=[[[1,3,5],[7,8,0]],[[0,3],[6,7,8],[1,-3,0]],[[-2,-9,-8],[8,0],[0,0,0]]]
  strHTML += "<table ><thead><tr><th>matriz</th><th>Resultado</th></tr></thead><tbody>";
  for(var i = 0; i<3;i++){
    strHTML+="<tr><td>"
    for(var j=0;j<prueba[i].length;j++){
      strHTML+="["+prueba[i]+"]";
    }

    strHTML+="</td>";
    strHTML+="<td>"+promedio(prueba[i])+"</td></tr>";
  }
    strHTML+="</tbody></table>";
  document.getElementById('tabla3').innerHTML= strHTML;

}


function inverso(){
  var numero=document.getElementById('inputInverso').value;
  var x=0;
  var y = numero;
  do{
    x = x*10+(y%10);
    y=Math.floor(y/10);
  }while(y>0);
  alert(x);
}

function ACM(){
  var x1=document.getElementById('ACM1').value;
  var y1=document.getElementById('ACM2').value;
  var x2=document.getElementById('ACM3').value;
  var y2=document.getElementById('ACM4').value;
  var input = {
  x1: x1,
  y1 : y1,
  x2 : x2,
  y2 : y2,
  resX : function() {
    if(x1==x2){
      return 0;
    }
    else if(x1>x2){
      return x1-x2;
    }
    else if(x2>x1){
      return x2-x1;
    }
  },

  resY : function() {
    if(y1==y2){
      return 0;
    }
    else if(y1>y2){
      return y1-y2;
    }
    else if(y2>y1){
      return y2-y1;
    }
  }

  };



  if(input.resY>input.resX) document.getElementById('resultadoACM').innerHTML= input.resY;
  else document.getElementById('resultadoACM').innerHTML= input.resX ;

}
