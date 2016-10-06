function alerteEsp(n) {
    switch (n) {
        case 1: page = "ext.php";       break;
        case 2: page = "wall/01.php";   break;
        case 3: page = "tlh/index.php";   break;
        case 4: page = "alt/index.php";   break;
        case 11: page = "../ext.php";   break;
        case 12: page = "../index.php";   break;
    }
    location.href = page;
}