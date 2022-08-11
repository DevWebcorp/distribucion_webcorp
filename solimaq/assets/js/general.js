// CONSTANTS

const STAGE = "DEV";
let BASE_URL = "";
switch (STAGE) {
    case "PROD":
        BASE_URL = 'https://solimaq.webcorp.com.mx/public/index.php/';
        break;
    case "TEST":
        BASE_URL = '';
        break;
    case "DEV":
        BASE_URL = 'http://localhost/solimaq/public/index.php/';
        break;
    default:
        break;
}