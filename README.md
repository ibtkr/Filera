# Filera
File Upload Service -No Limit-
Anonim dosya paylaşım için php script. 
Bu, bireylere sunucunuza dosya upload etmeleri için kuracağınız basit bir scripttir, p2p falan değildir, c2c hiç değildir. Alıp geliştirebilirsiniz. "yuklenen_dosyalar" tablosundan veri çeken bir sayfa oluştursanız ilk adımı çözmüş oluyorsunuz.

Yukarıdaki kod, öncelikle yüklenen dosyanın geçerli olup olmadığını kontrol eder. Ardından, dosyayı belirtilen klasöre kaydeder ve IP adresini veritabanına kaydeder. Bu örnekte, veritabanı bağlantısı için localhost, kullanici_adi, sifre ve veritabani bilgilerini kendi veritabanı bilgilerinizle değiştirmeniz gerekmektedir.

## Veritabanı Tablosu Oluşturma:
   - Son olarak, veritabanında dosya yüklemelerini kaydetmek için bir tablo oluşturmanız gerekmektedir.
   - Örnek bir SQL sorgusuyla `yuklenen_dosyalar` adlı bir tablo oluşturun:

   ```sql
   CREATE TABLE yuklenen_dosyalar (
     id INT AUTO_INCREMENT PRIMARY KEY,
     dosya_adi VARCHAR(255) NOT NULL,
     ip_adresi VARCHAR(45) NOT NULL,
     tarih TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

   - Yukarıdaki SQL sorgusu, `yuklenen_dosyalar` adlı bir tablo oluşturacak. Tabloda `id` (otomatik artan bir tamsayı), `dosya_adi` (dosya adı), `ip_adresi` (IP adresi) ve `tarih` (dosya yükleme tarihi) sütunları yer alır.
