var stt = 0; var page = '';
var musicX = 0;
var opnX = 0;

function Xclose() {
    $('.WI').css({
        "transition":".7s all",
        "opacity":"0"
    });
    setTimeout(posClose(),1000)
}
function posClose() {
    $('.WI').css({"display":"none"}).html('');
    if (musicX == 1) {
        musicX = 0;
        opnX = 0;
    }
}

function displaymenu() {
    if (stt == 0) {
        $('.floatMenu').collapse('show');
        stt = 1;
    }
    else {
        $('.floatMenu').collapse('hide');
        stt = 0;
    }
}

function toLocal(loc) {
    switch (loc) {
        case 1: page = "ext.php";       break;
        case 2: page = "wall/01.php";   break;
        case 3: page = "tlh/index.php";   break;
        case 4: page = "alt/index.php";   break;
        case 5: page = "imp/index.php";   break;
        case 6: page = "SIG/index.php";   break;
        case 7: page = "task/index.php";   break;
        case 8: page = "msc/index.php";   break;
        case 9: page = "pgb/index.php";   break;
        case 11: page = "../ext.php";   break;
        case 12: page = "../index.php";   break;
    }
    location.href = page;
}

function opnW(op) {
    var conteudo = '';
    var titulo = 'Janela';

    switch (op) {
        case 1:
            if (musicX == 1) {
                alert('Janela já aberta');
                opnX = 1;
            } else {
                conteudo = "<iframe class='xframe' src='imp/html5-music-player-app/index.html'></iframe>";
                titulo = 'html5-music-player-app';
                musicX = 1;
            }
        break;
    }

    if (opnX == 0) {
        $(
            "<div class='WI'>" +
            "<div class='topWI'> <span>" + titulo + "</span> <div class='topX' onclick='Xclose()'></div> </div>" +
                "<div class='xWI'>" +
                    conteudo +
                "</div>" +
            "</div>"
            , {}).appendTo('body');
    }
}

function toLoc(loc) { location.href = loc; }