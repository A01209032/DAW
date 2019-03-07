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
  var resultado = window.prompt(x + " " + y, 10);
  var elapsed = new Date().getTime() -start;
  if(resultado==(x+y)){
    alert("correcto, timepo:" + elapsed);
  }
  else alert("incorrecto, timepo:" + elapsed);
}

function contador(arr){
  var arreg=document.getElementById(arr).value;
  var arreglo = arreg.split(",");
  var positivos=0,negativos=0,ceros=0;
  for(var i=0;arreglo.length;i++){
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

function promedio(){
  matriz=[[document.getElementById('numero1').innerHTML,document.getElementById('numero2').innerHTML],[document.getElementById('numero3').innerHTML,document.getElementById('numero4').innerHTML],[document.getElementById('numero5').innerHTML,document.getElementById('numero6').innerHTML]];
  var promedio=0;
  console.log(promedio);
  for(var i=0;matriz.length>i;i++){
    for(var j=0;matriz[i].length;j++){
      promedio = promedio + matriz[i][j];
    }
    console.log(i);
    promedio = promedio/matriz[i].length;
    alert(promedio);
    promedio=0;
  }
}

function inverso(numero){
  var x;
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
  var resX;
  var resY;
  if(x1==x2){
    resX=0;
  }
  else if(x1>x2){
    resX=x1-x2;
  }
  else if(x2>x1){
    resX=x2-x1;
  }
  if(y1==y2){
    resY=0;
  }
  else if(y1>y2){
    resY=y1-y2;
  }
  else if(y2>y1){
    resY=y2-y1;
  }
  if(resY>resX) document.getElementById('resultadoACM').innerHTML= resY;
  else document.getElementById('resultadoACM').innerHTML= resX ;

}
