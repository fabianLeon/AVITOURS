/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function activar_regreso() {
    document.vuelos.fecha_regreso.disabled = false;
}
function desactivar_regreso() {
    document.vuelos.fecha_regreso.disabled = true;
}

function origen_destino() {
    var a = document.vuelos.origen;
    var b = document.vuelos.destino;
    if (String(a.value.toLowerCase()) == String(b.value.toLowerCase())) {
        alert("La ciudad de origen no puede ser igual que la ciudad de destino");
        b.value = "";
    }

}