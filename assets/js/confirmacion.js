function confirmacion(evento){
    if (confirm("¿ESTAS SEGURO QUE DESEA ELIMINAR ESTE REGISTRO?")){
        return true;
    } else {
        evento.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".eliminateTable");
for (var i = 0; i < linkDelete.length; i++){
    linkDelete [i] .addEventListener('click', confirmacion);
}