// github.com/v4r1able

const express = require('express');
const curl = require("curlrequest");
const app = express();

app.listen(8888,function(){
    console.log("github.com/v4r1able | bot 8888 portu üzerinden başlatıldı.");
});

app.get('/',function(istek, cikti){

var ayarlar = {
    url: 'https://covid19.saglik.gov.tr/covid19api?getir=sondurum'
};
 
curl.request(ayarlar, function (hata, v4_veri) {

const sondurumjson = JSON.parse(v4_veri);

cikti.send("<h2>Bugün</h2> Tarih : "+sondurumjson[0].tarih+"<br> Bugünkü Test Sayısı : "+sondurumjson[0].gunluk_test+"<br> Bugünkü Hasta Sayısı : "+sondurumjson[0].gunluk_vaka+"<br> Bugünkü Vefat Sayısı : "+sondurumjson[0].gunluk_vefat+"<br> Bugünkü İyileşen Sayısı : "+sondurumjson[0].gunluk_iyilesen+"<br> <h2>Bu Hafta</h2> Hastalarda Zatüre Oranı : %"+sondurumjson[0].hastalarda_zaturre_oran+"<br>Yatak Doluluk Oranı : %"+sondurumjson[0].yatak_doluluk_orani+"<br> Erişkin Yoğun Bakım Doluluk Oranı : %"+sondurumjson[0].eriskin_yogun_bakim_doluluk_orani+"<br> Ventilatör Doluluk Oranı : %"+sondurumjson[0].ventilator_doluluk_orani+"<br> Ortalama Temaslı Tespit Süresi : "+sondurumjson[0].ortalama_temasli_tespit_suresi+" Saat<br> Filyasyon Oranı : %"+sondurumjson[0].filyasyon_orani+"<h2>Toplam</h2> Test Sayısı : "+sondurumjson[0].toplam_test+"<br> Hasta Sayısı : "+sondurumjson[0].toplam_vaka+"<br> Vefat Sayısı : "+sondurumjson[0].toplam_vefat+"<br> Ağır Hasta Sayısı : "+sondurumjson[0].agir_hasta_sayisi+"<br> İyileşen Hasta Sayısı : "+sondurumjson[0].toplam_iyilesen+"<br><br> <a href='https://github.com/v4r1able'>v4r1able</a>");

});

});
