<?php
//多个
echo '<title>随机图片</title>';
if (isset($_GET["photos"])){
$photo=$_GET["photos"];
$p=file_get_contents("photos.txt");
$ps=$p.$photo."\n";
$f=fopen("photos.txt","w");
fwrite($f,$ps);
fclose($f);
echo "<h4>$photo</h4>写入文件成功<br><a href='photos.txt'>查看</a><br><a href='../rand/'>主页</a><br><a href='../rand/?614'>继续</a>";
die();
    }
    //单个
if (isset($_GET["photo"])){
$photo=$_GET["photo"];
$p=file_get_contents("photos.txt");
$ps=$p.$photo."\n";
$f=fopen("photos.txt","w");
fwrite($f,$ps);
fclose($f);
echo "<h4>$photo</h4>写入文件成功<br><a href='photos.txt'>查看</a><br><a href='../rand/'>主页</a><br><a href='../rand/?614'>继续</a>";
die();
    }
if (isset($_GET["614"])){
echo "<h4>单个</h4><form name='upload'><input name='photo'><br><button>提交</button></form>";
echo "<h4>多个</h4><form name='uploads'><textarea name='photos'></textarea><br><button>提交</button></form>";
}
else{
$p=file_get_contents("photos.txt");
$s=explode("\n",$p);
$l=count($s)-1;
$r=rand(0,$l-1);
$r=$s[$r];
function download($file_url, $save_to)
	{
		$content = file_get_contents($file_url);
		file_put_contents($save_to, $content);
	}
$name='../rand/'.md5($r).'.jpg';
$f="../rand/";
$ff=scandir($f);
foreach ($ff as $vv){
if ($vv!="." and $vv!=".."){
if($f.$vv==$name) 
{
header("Location:$name"); 
die();
}
//echo "<br>".$vv;
} 
}
download($r,$name);
header("Location:$name");
//echo $name;
}
?>