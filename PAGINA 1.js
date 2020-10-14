function abrir(ventana){
    document.getElementById(ventana).style.display="block";
}

function cerrar(vent){
    document.getElementById(vent).style.display="none";
}

(function(){
    $('#slider a:gt(0)').hide();
    var interval = setInterval(changeDiv, 6000);
    function changeDiv(){
    $('#slider a:first-child').fadeOut(1000).next('a').fadeIn(1000).end().appendTo('#slider');
    };
    $('.mas').click(function(){
    changeDiv();
    clearInterval(interval);
    interval = setInterval(changeDiv, 6000);
    });
    $('.menos').click(function(){
    $('#slider a:first-child').fadeOut(1000);
    $('#slider a:last-child').fadeIn(1000).prependTo('#slider');
    clearInterval(interval);
    interval = setInterval(changeDiv, 6000);
    });
    });
