function consulta(){
    let dni = $("#iddni").val();
    $.get({
        url:"http://localhost/ejercicios/02_JoseLuisDelgado/consultarBD.php?dni="+dni,
        success: success
    });
}
function success(data){
    if("error"==data)
    {
        alert("Usuario no encontrado");
    }else{
        mostrarDatos(data);
    }
}
function mostrarDatos(data){
    let values = data.split("-");

    $("#idnombre").val(values[1]);
    $("#idapellidos").val(values[2]);
    $("#idfecha").val(values[3]);
    $("#idemail").val(values[4]);
    $("#idtelefono").val(values[5]);
    $("#idmovil").val(values[6]);
    $("#idNexp").val(values[7]);
    $("#idNota").val(values[8]);
}
function recuperarDatos(){

    let data = {
        dni: $("#iddni").val(),
        nombre: $("#idnombre").val(),
        apellidos: $("#idapellidos").val(),
        fechaNac: $("#idfecha").val(),
        correo: $("#idemail").val(),
        telefono: $("#idtelefono").val(),
        movil: $("#idmovil").val(),
        nExp: $("#idNexp").val(),
        nota: $("#idNota").val()
    };
    return data;
}
function guardar(){
    let dataform = $('form[name="formulario"]').serialize();
    console.log("dataform: "+dataform);
    $.get({
        url:"http://localhost/ejercicios/02_JoseLuisDelgado/insertarBD.php?"+dataform,
        success: successCrear(dataform),
        datatype: "json"
    })
    alert("Guardado correctamente");
}
function successCrear(){
    alert("Guardado en base de datos");
}