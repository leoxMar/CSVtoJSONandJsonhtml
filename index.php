<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <select name="regioni" id="regioni">
        <option class="base" value=""> -- Seleziona Regione -- </option>
    </select>
    <select name="province" id="province" disabled>
        <option class="base" value=""> -- Seleziona Provincia -- </option>
    </select>
    <select name="comuni" id="comuni" disabled>
        <option class="base" value=""> -- Seleziona Comune -- </option>
    </select>


    <script>
        fetch('endpoints/regioni.php')
            .then(data => data.json())
            .then(data => {

                var regioni = document.getElementById('regioni')

                data.forEach(el => {

                    var option = document.createElement('option')
                    option.innerHTML = el.nome
                    option.value = el.codice
                    regioni.appendChild(option)
                })

                regioni.addEventListener('change', function() {
                    var province = document.getElementById('province')
                    if(regioni.value != ""){
                        province.removeAttribute('disabled')
                    } else{
                        province.setAttribute('disabled', true)
                    }

                    var codice_regione = regioni.value
                    province.querySelectorAll('option:not(.base)')
                        .forEach(el => {
                            el.remove();
                        })
                    fetch('endpoints/province.php')
                        .then(prov => prov.json())
                        .then(prov => {

                            prov = prov.filter(el => el.codice_regione == codice_regione)
                            prov.forEach(el => {
                                var option = document.createElement('option')
                                option.innerHTML = el.nome
                                option.value = el.codice
                                province.appendChild(option)
                            })
                        })

                })

                var province = document.getElementById('province')

                province.addEventListener('change', function() {
                    var comuni = document.getElementById('comuni')
                    
                    if(province.value != ""){
                        comuni.removeAttribute('disabled')
                    } else{
                        comuni.setAttribute('disabled', true)
                    }


                    var codice_provincia = province.value
                    comuni.querySelectorAll('option:not(.base)')
                        .forEach(el => {
                            el.remove();
                        })
                    fetch('endpoints/comuni.php')
                        .then(com => com.json())
                        .then(com => {
                            var comuni = document.getElementById('comuni')
                            com = com.filter(el => el.codice_provincia == codice_provincia)
                            com.forEach(el => {
                                var option = document.createElement('option')
                                option.innerHTML = el.nome
                                option.value = el.codice
                                comuni.appendChild(option)
                            })
                        })

                })




            })
    </script>

</body>

</html>