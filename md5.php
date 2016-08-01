<?php 
error_reporting(0);
/*

*    Janissaries Md5 Cracker Via Hashes.org&Nitrxgen.net

*    Coded By Arsle

*    contact for questions : arsle@janissaries.org

*    Script Language : Turkish

*    Janissaries.Org

*     wwww.Arsle.org

*/
class md5
{
    public function curlbaglan2($md5)
    {
        $zaman=time();
        $yaz=fopen('arslecrack.txt','a');
        $link="http://www.nitrxgen.net/md5db/$md5";
        
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL,$link);

        
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
        
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        
        curl_setopt ($ch, CURLOPT_COOKIEJAR, "cookie.txt");

        $result = curl_exec ($ch);
    
        curl_close($ch);
        
        
        
        if($result=="")
        {
            
            
                $this->curlbaglan($md5);
            
            
           
        }
        else
        {
            echo "\nHash:$md5\nKirildi:".$result . "\nAlgoritma:N/A" ;
        echo "\n------------------------------------------\n";
        fwrite($yaz,"------------------------------------------\n");
        fwrite($yaz,"Hash:$md5\nKirildi:".$md5."\nAlgoritma:N/A\n");

        }
    }
    
    public function curlbaglan($md5)
    {
        $yaz=fopen('arslecrack.txt','a');
        $link="https://hashes.org/api.php?act=REQUEST&key=MpTnwhPuNy2tNrjDrGH7HhM1wLA98H&hash=$md5";
        
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL,$link);

        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");
        
        curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        
        curl_setopt ($ch, CURLOPT_COOKIEJAR, "cookie.txt");

        $result = curl_exec ($ch);
    
        curl_close($ch);
        
        $veri=json_decode($result);
        
        if($veri->$md5==null)
        {
             echo chr(27) . "[1;33mKirilamadi:$md5".chr(27) . "[0m";
             echo "\n------------------------------------------\n";
        }
        else
        {
            echo chr(27) . "[0;32m" . "Hash:$md5\nKirildi:".$veri->$md5->plain ."\nAlgoritma:".$veri->$md5->algorithm . chr(27) . "[0m";
        echo "\n------------------------------------------\n";
        fwrite($yaz,"------------------------------------------\n");
        fwrite($yaz,"Hash:$md5\nKirildi:".$veri->$md5->plain ."\nAlgoritma:".$veri->$md5->algorithm."\n");
        }
        
        
        
    }
}
echo chr(27) . "[0;36m

|-------Md5 Cracker Via Hashes.org&Nitrxgen.net--------|
|      _             _                    _            |
|     | |           (_)                  (_)           |
|     | | __ _ _ __  _ ___ ___  __ _ _ __ _  ___  ___  |
| _   | |/ _` | '_ \| / __/ __|/ _` | '__| |/ _ \/ __| |
|| |__| | (_| | | | | \\__ \\__ \\ (_| | |  | |  __/\\__ \\ |
| \\____/ \\____|_| |_|_|___/___/\\____|_|  |_|\\___||___/ |
|-------------arsle@janissaries.org--------------------|
|             /\\            | |                        |
|            /  \\   _ __ ___| | ___                    |
|           / /\ \\ | '__/ __| |/ _ \\                   |
|          / ____ \\| |  \\__ \\ |  __/                   |
|         /_/    \\_\\_|  |___/_|\\___|                   |
|-----------------www.arsle.org------------------------|
". chr(27) . "[0m";



$md5=new md5();

$md5ler=file_get_contents($argv[1]);
$md5ler=explode(PHP_EOL,$md5ler);
//$sayi=0;

//$zaman=time();
//$uzunluk=count($md5ler);

/*for($i=0;$i<=($uzunluk-1);$i++)
{
    if($sayi==20){
    $sleepzaman=60-(time()-$zaman);
    echo  chr(27) ."[0;37m $sleepzaman Saniye Uykuya Gecti...". chr(27) . "[0m";
    echo "\n------------------------------------------\n";
    sleep($sleepzaman);
    $sayi=0;
    $i-=1;
    $zaman=time();
 }
 else {
     $sayi+=1;
     $md5->curlbaglan($md5ler[$i]);
 }
}*/
 
 foreach($md5ler as $md5kir)
 {
     $md5->curlbaglan2($md5kir);
 }





?>
