$(document).ready(() =>{
    setInterval(()=>{
        $("input").each(function (){
            if($(this).val()){
                $(this).css("border-color", "green");
            }
            else{
                if($(this).attr("required")){
                    $(this).css("border-color", "orange");
                }
            }
        });
    }, 3000);

    let empIn=0;
    $("#submit").click(function(event) {
        $("input[required]").each(function (){
            if(!($(this).val())){
                empIn++;
            }
        });
        if(empIn>0){
            //event.preventDefault();
            alert("Preecha todos os campos alaranjados.");
        }
    });

    $(".fields:eq(1)").hide();
    $(".fields:eq(2)").hide();
    $(".fields:eq(3)").hide();
    $("#info").css("background-color", "#0084ff");

    $("#info").click(()=>{
        $("#info").css("background-color", "#0084ff");
        $("#orador, #parceiro, #evento").css("background-color", "#fff");
        $(".fields:eq(0)").show();
        $(".fields:eq(1), .fields:eq(2), .fields:eq(3)").hide();
    });
    $("#orador").click(()=>{
        $("#orador").css("background-color", "#0084ff");
        $("#info, #parceiro, #evento").css("background-color", "#fff");
        $(".fields:eq(1)").show();
        $(".fields:eq(0), .fields:eq(2), .fields:eq(3)").hide();
    });
    $("#parceiro").click(()=>{
        $("#parceiro").css("background-color", "#0084ff");
        $("#info, #orador, #evento").css("background-color", "#fff");
        $(".fields:eq(2)").show();
        $(".fields:eq(0), .fields:eq(1), .fields:eq(3)").hide();
    });
    $("#evento").click(()=>{
        $("#evento").css("background-color", "#0084ff");
        $("#info, #orador, #parceiro").css("background-color", "#fff");
        $(".fields:eq(3)").show();
        $(".fields:eq(0), .fields:eq(1), .fields:eq(2)").hide();
    });

    
});