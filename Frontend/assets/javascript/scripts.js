var personas = [];
var cursos = [];
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
        this.cursos = res.data;
        generarListadoCursos();

    }).catch(err=>{
        console.error(err);
    })
}
cursosAPItraerCursos ()

const generarListadoCursos = () => {
    document.querySelector('#v-pills-tab').innerHTML += `
    <a class="nav-link active" id="v-pills-${cursos[0].legajo}-tab" 
    data-bs-toggle="pill" data-bs-target="#v-pills-${cursos[0].legajo}" 
    role="tab" aria-controls="v-pills-${cursos[0].legajo}" aria-selected="true">
                ${cursos[0].nombre_curso}
            </a>
    `;
    document.querySelector('#v-pills-tabContent').innerHTML += `
        <div class="tab-pane fade show active" id="v-pills-${cursos[0].legajo}" role="tabpanel" 
        aria-labelledby="v-pills-${cursos[0].legajo}-tab" tabindex="0">
                <div class="card border-primary border-2 p-3">
                    <div class="card-header bg-primary text-light">
                        <h5 class="card-title">${cursos[0].nombre_curso}</h5>
                    </div>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item fs-4">Modalidad : ${cursos[0].modalidad==0?"Grupal":"Individual"}</li>
                        <li class="list-group-item fs-4">${cursos[0].descripcion_curso}</li>
                        <li class="list-group-item fs-4">10</li>
                    </ul>
                   
                </div>
            </div>`;
    for (let i=1; i < this.cursos.length; i++){
        document.querySelector('#v-pills-tab').innerHTML += `
        <a class="nav-link" id="v-pills-${cursos[i].legajo}-tab" data-bs-toggle="pill"
           data-bs-target="#v-pills-${cursos[i].legajo}" role="tab"
           aria-controls="v-pills-${cursos[i].legajo}" aria-selected="false">
            ${cursos[i].nombre_curso}
        </a>`;
        document.querySelector('#v-pills-tabContent').innerHTML += `
        <div class="tab-pane fade" id="v-pills-${cursos[i].legajo}" role="tabpanel" 
        aria-labelledby="v-pills-${cursos[i].legajo}-tab" tabindex="0">
                <div class="card border-primary border-2 p-3">
                    <div class="card-header bg-primary text-light">
                        <h5 class="card-title">${cursos[i].nombre_curso}</h5>
                    </div>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item fs-4">${cursos[i].modalidad==0?"Grupal":"Individual"}</li>
                        <li class="list-group-item fs-4">${cursos[i].descripcion_curso}</li>
                        <li class="list-group-item fs-4">10</li>
                    </ul>
                   
                </div>
            </div>`;
    }
}