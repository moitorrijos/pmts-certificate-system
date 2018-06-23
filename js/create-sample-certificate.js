var createCertificateButton = jQuery('.create-certificate-button');
var index = 1;
var startClicking = setInterval( clickPrintButtons, 3600 );

function clickPrintButtons(){ createCertificateButton[index].click(); index++; if (index > createCertificateButton.length){ clearInterval(startClicking); } }