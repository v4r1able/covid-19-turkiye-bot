<?php
// github.com/v4r1able

function objectToArray($d)
{
if (is_object($d)) {
// Gets the properties of the given object
// with get_object_vars function
$d = get_object_vars($d);
}

if (is_array($d)) {
/*
* Return array converted to object
* Using __FUNCTION__ (Magic constant)
* for recursive call
*/
return array_map(__FUNCTION__, $d);
} else {
// Return array
return $d;
}
}

$ch = curl_init("https://covid19.saglik.gov.tr/covid19api?getir=sondurum");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_NOBODY, 0);
$index = curl_exec($ch);

$json_v4 = json_decode($index);

$json_v4 = objectToArray($json_v4[0]);
?>


<h2>Bugün</h2>
Tarih : <?php echo $json_v4["tarih"]; ?><br>
Bugünkü Test Sayısı : <?php echo $json_v4["gunluk_test"]; ?>
<br> Bugünkü Hasta Sayısı : <?php echo $json_v4["gunluk_vaka"]; ?>
<br> Bugünkü Vefat Sayısı : <?php echo $json_v4["gunluk_vefat"]; ?>
<br> Bugünkü İyileşen Sayısı : <?php echo $json_v4["gunluk_iyilesen"]; ?>
<br> <h2>Bu Hafta</h2> 
Hastalarda Zatüre Oranı : %<?php echo $json_v4["hastalarda_zaturre_oran"]; ?>
<br>Yatak Doluluk Oranı : %<?php echo $json_v4["yatak_doluluk_orani"]; ?>
<br> Erişkin Yoğun Bakım Doluluk Oranı : %<?php echo $json_v4["eriskin_yogun_bakim_doluluk_orani"]; ?><br>
Ventilatör Doluluk Oranı : %<?php echo $json_v4["ventilator_doluluk_orani"]; ?>
<br> Ortalama Temaslı Tespit Süresi : <?php echo $json_v4["ortalama_temasli_tespit_suresi"]; ?> Saat<br>
Filyasyon Oranı : %<?php echo $json_v4["filyasyon_orani"]; ?>
<h2>Toplam</h2> Test Sayısı : <?php echo $json_v4["toplam_test"]; ?><br>
 Hasta Sayısı : <?php echo $json_v4["toplam_vaka"]; ?><br>
 Vefat Sayısı : <?php echo $json_v4["toplam_vefat"]; ?><br>
 Ağır Hasta Sayısı : <?php echo $json_v4["agir_hasta_sayisi"]; ?><br>
 İyileşen Hasta Sayısı : <?php echo $json_v4["toplam_iyilesen"]; ?><br><br> <a href='https://github.com/v4r1able'>v4r1able</a>
