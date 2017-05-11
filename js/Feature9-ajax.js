/**
 * Created by jorisdelvaux on 29/04/17.
 */
$(document).ready(function(){
    $("#btnSubmit").on("click", function(e){
        //text vak uitlezen
        var update = $("#activitymessage").val();
        // via AJAX update naar db sturen

        $.ajax({
            method: "POST",
            url: "ajax/save_comment.php",
            data: { update: update}
        })


            .done(function(response ) {
                //code + message

                if (response.code == 200){

                    // iets plaatsen
                    var li = $("<li> ");
                    li.html("<h2> Naam van de gebruiker </h2>" + response.message)
                    // waar
                    $("#listupdates").prepend(li);
                    //$("#listupdates li").first().slideDown();

                }



            });

        e.preventDefault();

    });


});