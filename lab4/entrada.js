function generaTabla(){
  var number = window.prompt("Please enter a number", 10);
  document.write("<table><thead><tr><th>n</th><th>n²</th><th>n³</th></tr></thead><tbody>");
  for(var i = 0; number>i;i++){
    document.write("<tr><td>"+number+"</td></tr>");
    document.write("<tr><td>"+(number*number)+"</td></tr>");
    document.write("<tr><td>"+(number*number*number)+"</td></tr>");
  }
  document.write("</tbody></table>");

}

function sumaRandom(){
  var x = new Math.floor((Math.random() * 100) + 1);
  var y = new Math.floor((Math.random() * 100) + 1);
  var start = new Date().getTime();
  var resultado = window.prompt(x + " " + y, 10);
  var elapsed = new Date().getTime() -start;
  if(resultado==(x+y)){
    alert("correcto, timepo:" + elapsed);
  }
  else alert("incorrecto, timepo:" + elapsed);
}

function contador(arreglo[]){
  var positivos=0,negativos=0,ceros=0;
  for(var i=0;arreglo[].length;i++){
    if(arreglo[i]>0){
      positivos++;
    }
    if(arreglo[i]==0){
      ceros++;
    }
    else negativos++;
  }
  alert("Positivos: " + positivos+ " Negativos: " + negativos + " Ceros: " + ceros);
}

function promedio(matriz[][]){
  var promedio=0;
  for(var i=0;matriz.length>i;i++){
    for(var j=0;matriz[i].length;j++){
      promedio = promedio + arreglo[i][j];
    }
    promedio = promedio/arreglo[i].length;
    document.write(promedio);
    promedio=0;
  }
}

function inverso()
