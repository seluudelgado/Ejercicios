$(function(){
	$("p").on("click",function(){
		alert("Se presionó un párrafo del documento");
	});
	$("table:last-child tr td p").on("click",function(){
		alert("Se presionó un párrafo contenido en la segunda tabla");
	});
});