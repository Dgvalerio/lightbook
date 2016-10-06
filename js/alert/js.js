var msg = '';
var btn = '';
function alerteEsp(n) {
    switch (n) {
        case 1:
            msg = 'OK';
            btn = "<button class='btn btn-block btn-success altBtn' onclick='altClick(1, 1)'>Ok</button>"; break;
        case 2:
            msg = 'Sim ou Não?';
            btn =
                "<div class='btn-group col-md-12 p-a-0' role='group'>" +
                    "<button class='btn btn-danger  col-md-6 altBtn' onclick='altClick(3, 2)'> Não </button>" +
                    "<button class='btn btn-success col-md-6 altBtn' onclick='altClick(2, 1)'> Sim </button>" +
                "</div>"
            ; break;
    }

    $('body').css({ "filter" : "blur(5px)" });

    setTimeout('nt(msg, btn)',900);

    $(
        "<div class='rtnDiv'>" +
        "<h4 class='msg'></h4>" +
        "</div>"
    , {}).appendTo('html');
}

function altClick(a, b) {
    if (b == 1) {
        $('.rtnDiv').css({ "background-color" : "#5cb85c" });
        if (a == 1) { msg = 'OK' } else if (a == 2) { msg = 'Sim' }
    } else if (b == 2) {
        $('.rtnDiv').css({ "background-color" : "#d9534f" });
        if (a == 3) { msg = 'Não' }
    }
    $('body')   .css({ "filter"  : "blur(0)" });
    $('.altDiv').css({ "display" : "none" });

    $('.rtnDiv').css({ "top" : "5%" });
    $('.rtnDiv').html("Você clicou em " + msg);
    setTimeout('ext(msg)',5000);
}

function ext() { $('.rtnDiv').css({ "top" : "-100px" }); }
function nt(msg, btn) {
    $(
        "<div class='altDiv'>" +
        "<div class='altCop'>" +
        "<h4>" + msg + "</h4>" +
        "</div>" +
        btn +
        "</div>"
    , {}).appendTo('html');
}