var firstLaunch = true;
var randomNumber = 20;
var myInterval;
var allowed = true;

var lightUp = function(i) {
    if(i < 15 && i <= randomNumber) {

        if(i == randomNumber) {

            myInterval = setInterval(function(){
                $('.panel').removeClass('bg-red');
                $(".p"+ randomNumber).addClass('bg-red');
                setTimeout(function() {
                    $('.p' + randomNumber).removeClass('bg-red');
                }, 300);
            }, 600);

        } else {
            setTimeout(function() {
                $(".p"+ i).addClass('bg-red');
                $('.p' + (i-1)).removeClass('bg-red');
                lightUp(++i);
            }, 300);
        }

    } else if (i >= 15 && firstLaunch) {
        i=1;
        randomNumber = Math.floor(Math.random() * 13) + 1;
        firstLaunch =  false;
        lightUp(i);
    }
};

var generateur = function () {
    $('#submit').each(function() {
        $(this).on('click', function () {
            if(allowed == true)
            {
                allowed = false;
                lightUp(1);
            }
        });
        /*$(this).change();*/
    });
};
generateur();

$('#stop').on('click', function() {
    clearInterval(myInterval);
    $('.bg-red').removeClass('bg-red');
    firstLaunch = true;
    randomNumber = 20;
    allowed = true;
});