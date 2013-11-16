<?php

$satirlar = '';
$dosya = file('alanadlari.txt');
$sayi = 0;
$liste = '';
$oyVer = '';
$metin = '';
$eskiOy = '';
$yeniOy = '';
$yeniMetin = '';
if(isset($_GET['oyver'])) {
    $domainOy = $_GET['oyver'];
    $oyVer = explode(';',$dosya[$domainOy]);
    $metin = $dosya[$domainOy];
    $eskiOy = $oyVer[1];
    $yeniOy = $oyVer[1]+1;
    $degistir = $oyVer[0] . ';' . $yeniOy;
    $degistir2 = $oyVer[0] . ';' . $eskiOy;
}


foreach ($dosya as $satir) {
        $oyVer = explode(';',$satir);
        $oy = $oyVer[1];
        $satir = str_replace(';','',$satir);
        $satir = str_replace($oy,'',$satir);
        $satirlar .= '<li>' . $satir . ' - Oy:' . $oy . '<a href="?oyver='. $sayi .'" class="oyVer">   Oy ver</a></li>';
        $sayi++;
}

if(isset($_GET['oyver'])) {
    if(in_array($metin, $dosya)) {
        $yeniMetin = str_replace($metin,$degistir.";\n",$dosya);
        file_put_contents("alanadlari.txt", $yeniMetin);
    }
    $liste = '<ol>'
                . $satirlar . 
            '</ol>
            <div class="linkAlani">
                <a href="index.php">
                    Domian Ekle
                </a>    
            </div>';
}

if(isset($_GET['sayfa'])) {
    $liste = '<ol>' 
                . $satirlar . 
            '</ol>
            <div class="linkAlani">
                <a href="index.php">
                    Domian Ekle
                </a>    
            </div>';
}