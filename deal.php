 <?php
 date_default_timezone_set("PRC");
 include 'class/qrlib.php';
 //$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
 $d = date("Ymd");
 $PNG_WEB_DIR = 'images/'.$d."/";
 if (!file_exists($PNG_WEB_DIR))
        mkdir($PNG_WEB_DIR);
 $content = empty($_POST['content']) ? "http://purplewolf.cn" : htmlspecialchars($_POST['content']);
 $level = $_POST['level'];
 $size = $_POST['size'];
 $date = date("Y_m_d_H_i_s");
$filename= $PNG_WEB_DIR."qrcode_".$date."_purplewolf.cn.png";
 QRcode::png($content,$filename,$level,$size,2);
//QRtools::timeBenchmark();
echo $filename;