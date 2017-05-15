<?php
class cript
{
var $key;
var $td;
var $time4keyToChange;
var $iv;

function cript($aKey='time',$aTime4keyToChange=3600)
 {
 $this->time4keyToChange=$aTime4keyToChange;
 if($aKey!='time')
   {
   $this->key=$aKey."&".intval(time()/$this->time4keyToChange);
   }
   else
   {
   $this->key=intval(time()/$this->time4keyToChange);
   }
 $this->td = MCRYPT_RIJNDAEL_256;
 $this->iv = "qe3jigneqfrgnqw2egfmas4qetjkn5lg";
 }


function hexFromBin($data)
{
return bin2hex($data);
}

function binFromHex($data)
 {
 $len = strlen($data);
 return pack("H" . $len, $data);
 }

function criptData($data)
 {
 return $this->hexFromBin(mcrypt_encrypt($this->td, $this->key, $data, MCRYPT_MODE_CBC, $this->iv));
 }
function decriptData($eData)
 {
 return trim(mcrypt_decrypt($this->td, $this->key, $this->binFromHex($eData), MCRYPT_MODE_CBC, $this->iv));
 }
}
return true;
?>

<?php
function _getconfigdb($key)
{
	$q=mysql_query("Select * from options where options_name='".$key."'");
	$r=	mysql_fetch_array($q);
	return $r['value'];
}

function _load($files) {
    $files = func_get_args();
    foreach($files as $file)
        require_once _LOADER."/".$file.".php";
}

function limit_500($str){
    echo substr($str, 0, 500);
}
function limit_200($str){
    echo substr($str, 0, 200);
}

function limit_text($str,$limit){
    echo substr($str, 0, $limit);
}


function _encodeParam($str)
{
	return $str;
}

function _decodeParam($str)
{  
	return $str;
}



function strip_word_html($text, $allowed_tags = '<b><i><sup><sub><em><strong><u><br>')
    {
        mb_regex_encoding('UTF-8');
        //replace MS special characters first
        $search = array('/&lsquo;/u', '/&rsquo;/u', '/&ldquo;/u', '/&rdquo;/u', '/&mdash;/u');
        $replace = array('\'', '\'', '"', '"', '-');
        $text = preg_replace($search, $replace, $text);
        //make sure _all_ html entities are converted to the plain ascii equivalents - it appears
        //in some MS headers, some html entities are encoded and some aren't
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        //try to strip out any C style comments first, since these, embedded in html comments, seem to
        //prevent strip_tags from removing html comments (MS Word introduced combination)
        if(mb_stripos($text, '/*') !== FALSE){
            $text = mb_eregi_replace('#/\*.*?\*/#s', '', $text, 'm');
        }
        //introduce a space into any arithmetic expressions that could be caught by strip_tags so that they won't be
        //'<1' becomes '< 1'(note: somewhat application specific)
        $text = preg_replace(array('/<([0-9]+)/'), array('< $1'), $text);
        $text = strip_tags($text, $allowed_tags);
        //eliminate extraneous whitespace from start and end of line, or anywhere there are two or more spaces, convert it to one
        $text = preg_replace(array('/^\s\s+/', '/\s\s+$/', '/\s\s+/u'), array('', '', ' '), $text);
        //strip out inline css and simplify style tags
        $search = array('#<(strong|b)[^>]*>(.*?)</(strong|b)>#isu', '#<(em|i)[^>]*>(.*?)</(em|i)>#isu', '#<u[^>]*>(.*?)</u>#isu');
        $replace = array('<b>$2</b>', '<i>$2</i>', '<u>$1</u>');
        $text = preg_replace($search, $replace, $text);
        //on some of the ?newer MS Word exports, where you get conditionals of the form 'if gte mso 9', etc., it appears
        //that whatever is in one of the html comments prevents strip_tags from eradicating the html comment that contains
        //some MS Style Definitions - this last bit gets rid of any leftover comments */
        $num_matches = preg_match_all("/\<!--/u", $text, $matches);
        if($num_matches){
              $text = preg_replace('/\<!--(.)*--\>/isu', '', $text);
        }
        return $text;
    } 
	
function _direct($to)
{
	echo "<script>window.location='".$to."'</script>";
}

function _checksession($name)
{
	if(isset($_SESSION[$name]))
	{
		return true;
	}else{
		return false;
	}
}

function _setsession($name,$value)
{
	$_SESSION[$name]=$value;
}

function _clearsession($name)
{
	unset($_SESSION[$name]);
}

function _replacenull($str,$str2)
{
	if(empty($str) || $str=="")
	{
		return $str2;
	}else{
		return $str;
	}
}
function hari($jam){
    if($jam <= '10.00'){
        echo "Selamat Pagi";
    }elseif($jam <= '14.30'){
        echo "Selamat Siang";
    }elseif($jam <= '18.00'){
        echo "Selamat Sore";
    }elseif($jam <= '23.00'){
        echo "Selamat Malam";
    }elseif($jam <= '23.59'){
        echo "Selamat Tidur";
    }else{
        echo "Mumet";
    }
    
};
//////////////////////////////////////////////////////////////////////

// fungsi untuk mengubah tanggal menjadi format bahasa indonesia, contoh: 14 Maret 2014 
function tgl_indo($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan   = ambilbulan(substr($tgl,5,2)); // konversi menjadi nama bulan bahasa indonesia
	$tahun   = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}	


// fungsi untuk mengubah angka bulan menjadi nama bulan
function ambilbulan($bln){
  if ($bln=="01") return "Januari";
  elseif ($bln=="02") return "Februari";
  elseif ($bln=="03") return "Maret";
  elseif ($bln=="04") return "April";
  elseif ($bln=="05") return "Mei";
  elseif ($bln=="06") return "Juni";
  elseif ($bln=="07") return "Juli";
  elseif ($bln=="08") return "Agustus";
  elseif ($bln=="09") return "September";
  elseif ($bln=="10") return "Oktober";
  elseif ($bln=="11") return "November";
  elseif ($bln=="12") return "Desember";
} 


////////////////////////////////////////////////////////////////////
function waktu(){
    echo "
    <script language='javascript'>
    function jam(){
    var waktu = new Date();
    var jam = waktu.getHours();
    var menit = waktu.getMinutes();
    var detik = waktu.getSeconds();
    
    if (jam < 10){
    jam = '0' + jam;
    }
    if (menit < 10){
    menit = '0' + menit;
    }
    if (detik < 10){
    detik = '0' + detik;
    }
    var jam_div = document.getElementById('jam');
    jam_div.innerHTML = jam + ':' + menit + ':' + detik;
    setTimeout('jam()', 1000);
    }
    jam();
    </script>
    ";
};
//////////////////////////////////////////////////////////////////////////////

//fungsi menghapus file
function HapusFile($namafile) { 
  $berhasil = false; 
  if (file_exists($namafile)) { 
    unlink ($namafile); 
	$berhasil = true; 
  } 
  return $berhasil; 
} 

//fungsi merubah nama file
function UbahNamaFile($lokasi, $awal, $baru) { 
  $fileAwal = $awal;
  $ekstensi=substr($fileAwal, strlen($fileAwal)-4,4);
  $fileBaru = $baru.$ekstensi;
  rename($lokasi.$fileAwal, $lokasi.$fileBaru);
  return $fileBaru;	
}

?>