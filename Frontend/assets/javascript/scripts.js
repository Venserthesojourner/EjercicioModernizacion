var personas = [];
const cargaInicialdeUsuarios = ()=>{
    axios({
        method: 'get',
        url: 'https://weblogin.muninqn.gov.ar/api/Examen',
        responseType: 'json'
    }).then(res=>{
        console.log(res.data.value);
        this.personas = res.data.value;
        completarTablaUsuariosFromEndpoint();
    }).catch(err=>{
        console.error(err);
    })
}
/*res.data.value.forEach(usuario => {
           axios({
                method: 'post',
                url: 'http://localhost/EjercicioModernizacion/Backend/api/personasAPI.php',
                responseType: 'json',
               data: {
                    dni: usuario.dni,
                    razonSocial: usuario.razonSocial,
                    fechaNacimiento: usuario.fechaNacimiento,
                    genero: usuario.genero.id,
                    domicilio: usuario.domicilio,
                    codigoPostal: usuario.codigoPostal,
               }
           }).then(res=>{
                console.log(res.data);
           }).catch(err=>{
               console.error(err);
           })
        });*/
cargaInicialdeUsuarios()
const completarTablaUsuariosFromEndpoint = ()=>{
for (let i = 0; i < this.personas.length; i++) {

    document.querySelector('#personas tbody').innerHTML += `
                    <tr>
                    <th scope='row'>${personas[i].id}</th>
                    <td>${personas[i]["dni"]}</td>
                    <td>${personas[i]["razonSocial"]}</td>
                    <td>${personas[i]["genero"]["value"]}</td>
                    <td>${personas[i]["codigoPostal"]["postalID"]}</td>
                    <td>${personas[i]["domicilio"]}</td>
                    </tr>`;
}
}
// Controles de la API Generos

const generosAPItraerGeneros = ()=>{
    axios({
        method: 'get',
        url: 'http://localhost/EjercicioModernizacion/Backend/api/generosAPI.php',
        responseType: 'json'
    }).then(res=>{
        console.log(res);
    }).catch(err=>{
        console.error(err);
    })
}
/*
const generosAPIAgregarGenero = (nombre)=>{
    axios({
        method: 'post',
        url: 'http://localhost/EjercicioModernizacion/Backend/api/generosAPI.php',
        responseType: 'json',
        data: {
            nombre: nombre
        }
    }).then(res=>{
        console.log(res);
    }).catch(err=>{
        console.error(err);
    })
}*/
const cursosAPItraerCursos = ()=>{
    const valores = window.location.search;
    console.log(valores);
    axios({
        method: 'get',
        url: 'http://localhost/EjercicioModernizacion/Backend/api/cursosAPI.php'+valores,
        responseType: 'json'
    }).then(res=>{
        console.log(res.data);
    }).catch(err=>{
        console.error(err);
    })
}
cursosAPItraerCursos ()