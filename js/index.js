/**
 * Created by ADMIN on 02/08/2017.
 */
function chk() {
    var firstname=document.getElementById('firstname').value;
    var lastname=document.getElementById('lastname').value;
    var email=document.getElementById('email').value;
    var psw=document.getElementById('psw').value;
    var sex=document.getElementById('sex').value;
    var address=document.getElementById('address').value;
    var age=document.getElementById('age').value;
    var dataString='firstname='+firstname+'&lastname='+lastname+'&email='+email+'&psw='+psw+'&sex='+sex+'&address='+address+'&age='+age;
    $.ajax({
            type:"post",
            url:"updateProfile.php",
            data: dataString,
            cache:false,
            success:function (d) {
                if(d>0){
                    $("#test").html("Your changes have been saved.");
                    setTimeout(function(){
                            location.reload();
                        }
                        ,2000);
                }else if(d==0){
                    $("#test").html("Check Fields");
                }
                else{
                    $("#test").html("Not saved.");
                }
            }
        }
    );
    return false
}

//RANGE SLIDER

var rangeSlider = function(){
    var slider = $('.range-slider'),
        range = $('.range-slider__range'),
        value = $('.range-slider__value');

    slider.each(function(){

        value.each(function(){
            var value = $(this).prev().attr('value');
            $(this).html(value);
        });

        range.on('input', function(){
            $(this).next(value).html(this.value);
        });
    });
};

rangeSlider();