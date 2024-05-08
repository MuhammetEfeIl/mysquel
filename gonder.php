<?php
// Veritabanı bağlantısı
$servername = "localhost"; // Sunucu adı
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi
$dbname = "okul"; // Veritabanı adı

// Bağlantı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Form verilerini al
$ogr_ad = $_GET['ogr_ad'];
$ogr_soyad = $_GET['ogr_soyad'];
$ogr_no = $_GET['ogr_no'];  
$ogr_sinif = $_GET['ogr_sinif'];
$cinsiyet = $_GET['cinsiyet'];
$ogr_alan = isset($_GET['ogr_alan'])? $_GET['ogr_alan'] : null;
$ogr_dtarih = $_GET['ogr_dtarih'];

// SQL sorgusu oluşturma
$sql = "INSERT INTO ogrenci (ogr_ad, ogr_soyad, ogr_no, ogr_sinif, cinsiyet, ogr_alan, ogr_dtarih)
VALUES ("$ogr_ad", "$ogr_soyad", "$ogr_no", "$ogr_sinif", "$cinsiyet", "$ogr_alan", "$ogr_dtarih"");

// Sorguyu çalıştırma ve sonucu kontrol etme
if ($conn->query($sql) === TRUE) {
    echo "Yeni kayıt başarıyla eklendi";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Bağlantıyı kapatma
$conn->close();
?>
