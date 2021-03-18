$(document).ready(function(){
    function animation(){
        $('#look')
            .css('position','relative')
            .animate({
                left: '30%',
            },2000);
        $('#look')
            .delay(50)
            .css('position','relative')
            .animate({
                    left:'0%',
            },2000)
    }
    function animation2(){
        $('#setAnim')
            .css('position','relative')
            .animate({
                left: '330%',
            },5000);
        $('#setAnim')
            .delay(110)
            .css('position','relative')
            .animate({
                    left:'50%',
            },2000)
        }
    setInterval(animation,1000);
    setInterval(animation2,1000);
    }); 
