<?php
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
$dirName="./images/";
$dir = scandir($dirName);
$today = date("Ymd");
//var_dump($dir);
for($a=0;$a<count($dir);$a++){
	if ($dir[$a]!="." && $dir[$a]!="..") {
		if(date($dir[$a])!=$today){
			delDirAndFile($dirName.$dir[$a]);
		}
	}
}
//循环删除目录和文件函数
function delDirAndFile($dirName )
{
	if ( $handle = opendir( "$dirName" ) ) {
		while ( false !== ( $item = readdir( $handle ) ) ) {
			if ( $item != "." && $item != ".." ) {
				if ( is_dir( "$dirName/$item" ) ) {
					delDirAndFile( "$dirName/$item" );
				} else {
					unlink( "$dirName/$item" );
					
				}
			}
		}
closedir( $handle );
rmdir($dirName);
}
}