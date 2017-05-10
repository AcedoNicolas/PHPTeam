$(document).ready(function(){
    $("#btnlike").on("click", function(e){
        //text vak uitlezen

        var btnlike = $("#btnlike").val();



        $.ajax({
            method: "POST",
            url: "../ajax/save-like.php",
            data: { update: btnlike }
        })

        .done(function(response ) {
            if (response.code == 200) {

                console.log(btnlike);
            }

        })
        e.preventDefault();

    });
    $("#btndislike").on("click", function(e){
        //text vak uitlezen
        var btndislike = $("#btndislike").val();

        console.log(btndislike);

        e.preventDefault();

    });

});