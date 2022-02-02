
$(document).ready(function () {

    $("#btn").hide();
    $(".quand").hide();
    $(".Salles").hide();

    $("#btn2").click(function () {
        $("#btn2").hide("fast");


        $("#btn").show("fast");
        $(".quand").show("slow");
        $(".Salles").show("fast");

    });


    $("#btnSupp").click(function () {
        alert('Votre reservation sera supprimée');
        suppReservation();
    })

});

function suppReservation() {

    var numReservation = document.getElementById("btnSupp");
    $.get("modules/mod_reservation/suppressionReservation.php", {
        idR: numReservation.value
    }).done(function (data) {
        $("tr").html(data)
    });

}

function listeSalles() {
    var numberInput = document.getElementById("nbPrsn");
    var myEquipment = document.getElementsByClassName("checkbox_check");



    numberInput.addEventListener("keyup", (function () {

        if (myEquipment.checked) {
            
            $.get("modules/mod_reservation/rechercheAvecMateriel.php", {
                term: numberInput.value,
                materiel: myEquipment.value
            }).done(function (data) {
                $("#salles").html(data)

            });
        }

        else {
            $.get("modules/mod_reservation/recherche.php", {
                term: numberInput.value
            }).done(function (data) {
                $("#salles").html(data)

            });

        }
    }));
}


$(function () {
    $("#jour").datepicker({
        beforeShowDay: $.datepicker.noWeekends,
        minDate: 0,
        format: "dd-mm-yyyy",
        maxDate: "+1M +1W"
    });
})


function majuscule() {
    var x = document.getElementById("nomUtilisateur");
    x.value = x.value.toUpperCase();
}
