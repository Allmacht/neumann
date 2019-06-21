window.onload = function(){
    var alert1 = $('#alert-1');
    var img  = $('#img-1');

    var med = window.matchMedia("(min-width: 768px)");

    if(med.matches){
        TweenMax.from(alert1, 1, {
            autoAlpha: 0,
            scale: 0,
            x: -300,
        });
        TweenMax.from(img, 1, {
            ease: Elastic.easeOut.config(1, 0.2),
            x: -100
        });
    }else{
        TweenMax.from(img, 1, {
            ease: Elastic.easeOut.config(1, 0.2),
            x: -50
        });
        TweenMax.from(alert1, 1, {
            autoAlpha: 0,
            y: -100,
            scale: 0,
        });
    }
}