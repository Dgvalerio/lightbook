function alerteEsp(n) {
    switch (n) {
        case 1:
            msg = 'OK';
            btn = "<button class='btn btn-block btn-success altBtn'>Ok</button>"; break;
        case 2:
            msg = 'Sim ou Não?';
            btn =
                "<div class='btn-group col-md-12 p-a-0' role='group'>" +
                    "<button class='btn btn-danger  col-md-6 altBtn'> Não </button>" +
                    "<button class='btn btn-success col-md-6 altBtn'> Sim </button>" +
                "</div>"
            ; break;
    }

    $('body').css({
        "opacity"   : "1",
        "filter"    : "blur(5px)"
    });

    $(
        "<div class='altDiv'>" +
            "<div class='altCop'>" +
                "<h4>" + msg + "</h4>" +
            "</div>" +
            btn +
        "</div>"
    , {}).appendTo('html');
}