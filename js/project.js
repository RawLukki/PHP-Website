
$(document).ready(function () {

    $(".formProjet").hide("fast");

    $("#defiler").click(function () {

        $("#defiler").hide("fast");
        $(".formProjet").show("fast");

    });

    $("#btnValide").click(function () {
        alert('Le projet sera considéré comme validé');
        changement();
    });
});

function changement() {
    alert('fonction changement');
    var numProjet = document.getElementById("btnValide");
    $.get("modules/mod_projet/projetAccepte.php", {
        idP: numProjet.value
    }).done(function (data) {
        $(".valider").html(data)
    });
}
