var QRCode, qrcode_obj;

(function() {

var certificate = document.getElementById('the-certificate'),
    certificateID = certificate.dataset.certificateId,
    qr_element = document.getElementById('qr-code');

new QRCode( qr_element, {
    text: qrcode_obj.qr_url + '?certificateId=' + certificateID,
    width: 97,
    height: 97,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
} );

})();