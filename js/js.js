var stt = 0; var page = '';
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

function toLoc(loc) { location.href = loc; }