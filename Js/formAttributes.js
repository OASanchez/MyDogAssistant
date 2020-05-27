/*window.onload=function(){
    var ageDec = document.getElementById("ageDec");
    var ageInc = document.getElementById("ageInc");
    ageDec.addEventListener("click", stepDown);
    ageInc.addEventListener("click", stepUp);
}

function stepDown(){
    var textVal = document.getElementById("age_textbox");
    var value = parseInt(textVal.value,10);

    if(value>0){
        textVal.innerHTML = value-1;
    }
}

function stepUp(){
    var textVal = document.getElementById("age_textbox");
    var value = parseInt(textVal.value,10);

    if(value<30){
        textVal.innerHTML = value+1;
    }
}


$("#ageDec").on("click", function(){
    var $age = $(this);
    var oldValue = $age.parent().find("input").val();

    
});*/


$(document).ready(function(){


    $("#ageInc").on('click', function(){
        if($("#age_textbox").val()<30){
            $("#ageInc").prop('disabled', false);
            $("#ageInc").css("opacity", "1");
            $("#ageDec").prop('disabled', false);
            $("#ageDec").css("opacity", "1");
            $("#age input").val(parseInt($("#age input").val())+1);

        }
        else{
            $("#ageInc").prop('disabled', true);
            $("#ageInc").css("opacity", "0.5");
        }
        
    });
    $("#ageDec").on('click', function(){
        if($("#age_textbox").val()>0){
            $("#ageDec").prop('disabled', false);
            $("#ageDec").css("opacity", "1");
            $("#ageInc").prop('disabled', false);
            $("#ageInc").css("opacity", "1");
            $("#age input").val(parseInt($("#age input").val())-1);

        }
        else{
            $("#ageDec").prop('disabled', true);
            $("#ageDec").css("opacity", "0.5");

        }
    });


    
});