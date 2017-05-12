/**
 * Created by jorisdelvaux on 29/04/17.
 */
$(document).ready(function(){
    $("#btnSubmit").on("click", function(e){
        //text vak uitlezen
        var update = $("#activitymessage").val();
        // via AJAX update naar db sturen
        //console.log(update);
        $.ajax({
            method: "POST",
            url: "ajax/save_comment.php",
            data: { update: update},
            succes: function(data){
                console.log('succes', data);
            }
        })

            .done(function(response) {
                console.log("ajax done");
            })

        /*.done(function(response ) {
                //code + message
                //console.log("jow");
                alert(response.message);
                if (response.code == 200){

                    // iets plaatsen
                    //var li = $("<li> ");
                    $res = alert('hallo');
                    console.log('hallo');
                    //var newCom = "<p>"  + response.message + "</p>";
                    // waar

                    //$("#listupdates").prepend(newCom);
                    //$("#listupdates li").first().slideDown();

                }



            });*/

        e.preventDefault();

    });


});