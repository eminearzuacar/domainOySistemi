<?php

$sonuc = '';
$kayit = '';


if(isset($_POST['anketText'])) {
    $anketText = $_POST['anketText'].";\n";
    $dosya = file("alanadlari.txt");
    
    if (in_array($anketText, $dosya)) {
        $sonuc .= "Bu domain sistemimizde bulunmaktadir.<br />Lütfen başka bir domain giriniz.";
    } else {
         if($anketText != 'Lütfen bir domain giriniz.') {
            file_put_contents("alanadlari.txt", $anketText, FILE_APPEND);
            $sonuc .= "Domain kaydedildi.";
        }
    }
}

$kayit = '<div class="sonucAlani">' 
               . $sonuc .
          '</div>
           <form action="" method="post" id="anketFormu">
                <input type="text" name="anketText" class="anketText" onblur="strrep(this,\'clear\',\'\');" onfocus="strrep(this,\'show\',\'Lütfen bir domain giriniz.\');" value="Lütfen bir domain giriniz."/> 
                <input type="submit" class="anketSubmit" value="Gönder"/>
           </form>
           <div class="linkAlani">
                <a href="?sayfa=listele">
                    Listele
                </a>    
            </div>';