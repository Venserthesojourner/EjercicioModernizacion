const cargaInicialdeUsuarios = ()=>{
    axios({
        method: 'get',
        url: 'https://weblogin.muninqn.gov.ar/api/Examen',
        responseType: 'json'
    }).then(res=>{
        console.log(res.data);
    }).catch(err=>{
        console.error(err);
    })
}