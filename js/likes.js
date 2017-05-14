$(document).ready(function(){
    $("#btnlike, #btndislike").on("click", function(e){
        //text vak uitlezen
        var klik;
        var btnlike = $("#btnlike").val();
        var btndislike = $("#btndislike").val();
        var id = this.id;

        // kijken waar er geklikt is , en een waarde toekennen al klaar voor in de database)
        if (id == 'btnlike'){
            klik = 1;
            console.log("geklikt op deze knop: "+btnlike );


        }else{
            klik = 0;
            console.log("geklikt op deze knop: "+btndislike);


        }

        $.ajax({
            method: "POST",
            url: "./ajax/save_like.php",
            data: { like: klik },
            datatype: 'json'

        })

    .done(function(response) {
        console.log("aantal likes: "+response.likes);
        console.log("aantal dislikes: "+response.dislikes);
        console.log("status : "+response.status);



//niet zeker of dit het goede criterium is, maar werkt wel
        if(response.feedback == null){
             // like en dislike mag


            if (id == 'btnlike'){
                console.log(btnlike );
                var aantalLikes = parseInt(response.likes);
                $("#setLikes").html(aantalLikes);




            }else{
                console.log(btndislike);
                var aantaldis = parseInt(response.dislikes);
                $("#setDislikes").html(aantaldis);


            }



        }else{
            console.log(response.feedback);
            $("#LikeFeed").html(response.feedback);
        }

        console.log("------");

        });
        e.preventDefault();

    });


});