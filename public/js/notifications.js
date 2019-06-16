$(document).ready(function(){

    var errors = $('.errors');
    var status = $('.status');

    TweenMax.from(errors, 1, {
        ease: Elastic.easeOut.config(1, 0.2),
        x: 100,
    });

    TweenMax.from(status, 1, {
        ease: Back.easeOut.config(2.7),
        x: 100
    });

});