function crecExp() {
  var x = document.getElementById('val1').value;
  var y = document.getElementById('val2').value;
  var res = parseFloat(x) * Math.pow(2,y);
  document.getElementById('resultado1').innerHTML = res+" Bacterias";
}

function timepo() {
  var x = document.getElementById('val3').value;
  var y = document.getElementById('val4').value;
  var res = 3.3*(Math.log10(x)- Math.log10(y));
  document.getElementById('resultado2').innerHTML = res+" Horas";
}
