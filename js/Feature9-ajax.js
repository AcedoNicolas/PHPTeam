$(document).ready(function(){
    $("#btnSubmit").on("click", function(e){
        //text vak uitlezen
        var update = $("#activitymessage").val()
        // via AJAX update naar db sturen
       $.ajax({
            method: "POST",
            url: "./ajax/save_comment.php",
            data: { activitymessage: update},
            datatype: 'json'

        })
         .done(function(response) {


             if (response.status == 'succes') {
                 // iets plaatsen
                 var name = response.persoon[0].fullname;
                 var avatar = response.persoon[0].avatar;
                 var comment =
                     "<article class=\"row\" >" +
                     "<div class=\"col-md-2 col-sm-2 hidden-xs\">" +
                     "<figure class=\"thumbnail\">" +
                     "<img class=\"img-responsive\" src=\" " + avatar + " \"/>" +
                     "<figcaption class=\"text-center\">" + name + "</figcaption>" +
                     "</figure>" +
                     "</div>" +

                     "<div class=\"col-md-10 col-sm-10\">" +
                     "<div class=\"panel panel-default arrow left\">" +
                     "<div class=\"panel-body\">" +
                     "<div class=\"comment-post\">" +
                     "<p>" + response.message + "</p>" +
                     "</div>" +
                     "</div>" +
                     "</div>" +
                     "</div>" +
                     "</article>";
                 // waar
                 $("#listupdates").prepend(comment);
                 $("#listupdates").first().slideDown();



                 document.getElementById("commentF").reset();

             }
             else{
                 var error = "<p>"+ response.message + "</p>";
                 $("#listupdates").prepend(error);
             }
            });


        e.preventDefault();

    });
});