<?php
// IP adresini alma
$ipAdresi = $_SERVER['REMOTE_ADDR'];

// Yüklenen dosyayı kontrol etme
if ($_FILES['dosya']['error'] === UPLOAD_ERR_OK) {
  $dosyaAdi = $_FILES['dosya']['name'];
  $geciciDosya = $_FILES['dosya']['tmp_name'];

  // Dosyayı istenen klasöre kaydetme
  $hedefKlasor = 'dosyalar/';
  $hedefDosya = $hedefKlasor . $dosyaAdi;

  if (move_uploaded_file($geciciDosya, $hedefDosya)) {
    // Dosya başarıyla yüklendi, IP adresini veritabanına kaydetme
    $baglanti = mysqli_connect("localhost", "kullanici_adi", "sifre", "veritabani");
    $sorgu = "INSERT INTO yuklenen_dosyalar (dosya_adi, ip_adresi) VALUES ('$dosyaAdi', '$ipAdresi')";
    mysqli_query($baglanti, $sorgu);
    mysqli_close($baglanti);

    echo "Dosya başarıyla yüklendi.";
  } else {
    echo "Dosya yükleme hatası.";
  }
} else {
  echo "Dosya yükleme hatası: " . $_FILES['dosya']['error'];
}
?>
