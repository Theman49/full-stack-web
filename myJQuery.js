$(window).ready(function(){
    $("#button").click(function(){
        // $("#input").focus();
        $(this).next().toggle();
    })

    $("#input").hover(
        function(){
            $(this).css("border", "2px dashed red");
        },
        function(){ // when unhover
            $(this).css("border", "1px solid #000");
        }
    )

    $("#input").keypress(function(e){
        var keycode = (e.keyCode ? e.keyCode : e.which);
        alert(keycode);
        // 13 = enter
        
    })

    // $("#button").mouseup(function(){
    //     alert("you are release the button right now");
    // })

    $("#button").mouseup(function(){
        // $("#p").append("wkwkkw.")
        // $("#p").hide(2000)
        // $("#p").show(4000)
        // $("#p").fadeToggle();
        $("#p").slideToggle("fast"); //fast,slow,miliseconds
    })
    $("#button").mousedown(function(){
        $("#p").append("<button type=\"button\"></button>");
    })

    $("#validate").click(function(){
        if($("#name").val()!=""){
            $(this).submit();
        } else {
            alert("there is null");
        }
    })

    // if(1<5){
    //     alert("1<5");
    // } else {
    //     alert("1>5");
    // } 
    // ternary -> var something ( 1 < 5 ?  "1 < 5"  :  "1 > 5")
    // alert(something)

    $("#sliding").click(function myFunc(){
        $("#p").html("<h1>this text has changed</h1>")
        $("#slidingElement").slideUp(function(){
            $(this).slideDown(3000);
        })
    })

    $("#slidingElement").hover(
        function(){
            // $(this).animate({width: "+=600"});
            // same with -> $(this).animate({width: "600"});
            $(this).animate(
                {
                width: 600,
                height: 400,
                borderWidth: "6px",
                backgroundColor: "red"
                },
                3000,
                function(){
                    alert("Finished-animated-callback");
                }
            )
        },
        function(){ //when unhovering
            // $(this).animate({width: "-=600"});
            // same with -> $(this).animate({width: "300 atau  ukuran semula"});


            $(this).animate(
                {
                width: 300,
                height: 300,
                borderWidth: "1px"
                },
                3000,
                function(){
                    alert("returned-callback");
                }
            )
        }
    )


    $("#sliding").click(function() {
        alert($("#validate").attr("type"));
        $("#validate").attr("type", "textarea");
    })

    $("#data").click(function(){
        alert($(this).data("nnumber")); //data-number --> data("number")
    })

    $("#ajax").click(function(){
        $.ajax({
            url: "second.html",
            success: function(data){
                $("#ajaxMe").html(data);
            }
        })
    })
})