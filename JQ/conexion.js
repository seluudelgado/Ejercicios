let posicion = window.location.href.lastIndexOf("/");
let HOST = window.location.href.substring(0,posicion);
function consulta(){
    let dni = $("#iddni").val();
    $.get({
        url:HOST+"/consultarBD.php?dni="+dni,
        success: success
    });
    alert("Ha entrado")
}
function success(data){
    if("error"==data)
    {
        alert("No existe el usuario");
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
        url:HOST+"/insertarBD.php?"+dataform,
        success: successCrear(dataform),
        datatype: "json"
    })
}
function successCrear(){
    alert("Guardado en base de datos");
}