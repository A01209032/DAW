function addvalue(id){
  document.getElementById(id).value++;
  actualizaCarrito();
}
function subvalue(id){
  if(document.getElementById(id).value !=0){
    document.getElementById(id).value--;
  }
  actualizaCarrito();
}
function actualizaCarrito(){

  let x = parseFloat(document.getElementById('producto1').value);
  let y = parseFloat(document.getElementById('producto2').value);
  let z = parseFloat(document.getElementById('producto3').value);
  console.log(x);
  document.getElementById('Nep').innerHTML = x;
  document.getElementById('NepC').innerHTML = (document.getElementById('Nep').innerHTML * 300);
  document.getElementById('Dros').innerHTML = y;
  document.getElementById('DrosC').innerHTML = (document.getElementById('Dros').innerHTML * 200);
  document.getElementById('Ping').innerHTML = z;
  document.getElementById('PingC').innerHTML = (document.getElementById('Ping').innerHTML * 100);
  document.getElementById('total').innerHTML = (x+y+z);
  document.getElementById('totalC').innerHTML =parseFloat(document.getElementById('NepC').innerHTML)+parseFloat(document.getElementById('DrosC').innerHTML)+parseFloat(document.getElementById('PingC').innerHTML);
  let aux = parseFloat(document.getElementById('totalC').innerHTML) + (parseFloat(document.getElementById('totalC').innerHTML) * parseFloat(.18));
  document.getElementById('totalC').innerHTML = aux;
}
