function validador(){
  let x = document.getElementById('val').value;
  let y = document.getElementById('val2').value;
  if(x.length = y.length){
    if(x.lastIndexOf(y)!=-1){
      document.getElementById('validad').innerHTML="Las contraseñas coinciden";
    }
    else {
      document.getElementById('validad').innerHTML="Las contraseñas no coinciden";
    }
  }
  else {
    document.getElementById('validad').innerHTML="Las contraseñas no coinciden";
  }
}
