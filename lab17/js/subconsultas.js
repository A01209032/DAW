let debug = false;

let consDivs = document.querySelectorAll('.consulta');
for (let div of consDivs) {
    let btn = div.querySelector('button');
    let consulta = div.id.substring(5);
    let inputs = div.querySelectorAll('input');
    
    btn.addEventListener('click', () => {
        let params = {};
        params['consulta'] = consulta;
        for (let inp of inputs) {
            params[inp.name] = inp.value;
        }
        sendConsulta(consulta, params); 
    });
}

function sendConsulta(consName, params) {
    
    console.log("Sending Consult: " + consName + " with params:");
    console.log(params);
    let type = 'json';
    if (debug) type = 'text';
    
    $.ajax('InfoSubConsultas.php', {
       method: 'POST',
       data: params,
       success: updateRes,
       dataType: type
    });
    
}

function updateRes(data) {
    let resDiv = document.getElementById('res-'+data.consulta);
    console.log("Response: ");
    console.log(data);
    if (!debug)
        resDiv.innerHTML = data.msg;
}