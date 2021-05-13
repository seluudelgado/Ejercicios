function descargaArchivo(){
    var titulopelicula =prompt("Introducir peli");
    $.ajax({
        url:   'http://www.omdbapi.com/?i=tt3896198&apikey=f02e43b0&t='+titulopelicula,
        datatype: 'json',
        type:  'GET',
        async: 'true',
        success:  function (datos) {
            visualizarPelicula(datos);
        }
    });
}
function visualizarPelicula(datos) {
    document.getElementById("titulo").value=datos.Title;
    document.getElementById("anyo").value=datos.Year;
    document.getElementById("duracion").value=datos.Runtime;
    document.getElementById("pais").value=datos.Country;
    document.getElementById("imdb").value=datos.imdbID;
    document.getElementById("sinop").value=datos.Plot;
    document.getElementById("director").value=datos.Director;
    document.getElementById("productor").value=datos.Production;
    document.getElementById("fecha").value=datos.Released;
    document.getElementById("guion").value=datos.Writer;
    document.getElementById("genero").value=datos.Genre;
    document.getElementById("portada").style.backgroundImage="url("+datos.Poster+")";
    urlImagen=datos.Poster;

}
function guardarPelicula()
{
    var imdb=document.getElementById("imdb").value;
    var titulo=document.getElementById("titulo").value;
    var anyo=document.getElementById("anyo").value;
    var duracion=document.getElementById("duracion").value;
    var pais=document.getElementById("pais").value;
    var sinop=document.getElementById("sinop").value;
    var director=document.getElementById("director").value;
    var productor=document.getElementById("productor").value;
    var fecha=document.getElementById("fecha").value;
    var guion=document.getElementById("guion").value;
    var genero=document.getElementById("genero").value;
    var portada=document.getElementById("portada").value;

    var date = new Date(fecha)
    var fecha=date.toISOString()
    $.ajax({
        url:   'consulta.php',
        datatype: 'php',
        type:  'post',
        data: '&imdb='+imdb+'&titulo='+titulo+'&anyo='+anyo+'&duracion='+duracion+'&pais='+pais+'&sinop='+sinop+'&director='+director+'&productor='+productor+'&fecha='+fecha+'&guion='+guion+'&genero='+genero+'&portada='+titulo+'.jpg',
        success:  function (datos) {
            if(datos=='bien')
            {
                alert("Bien guardado");
                guardarImagen(titulo);
            }else{
                alert(datos);
            }
        }
    });
}
function guardarImagen(titulo){
    var imagenn={url:imagen,nombre:titulo}
    $.ajax({
        url:   'iamgen.php',
        datatype: 'json',
        type:  'post',
        data: imagenn,
        success:  function (datos) {
            alert("Imagen guardada");
        }
    });
}