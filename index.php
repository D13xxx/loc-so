<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '44024M');

error_reporting(E_ALL);
ini_set('display_errors', 1);


 	
$data = file_get_contents("D3/D3-1.txt");
$blacklist = file_get_contents('ban_sao_blacklist.txt');
$blacklist1 = file_get_contents('Blacklist_update.txt');
// echo $blacklist; die;

$blacklist= str_replace("\n", "", $blacklist);
$arr_blacklist  = explode("\r", $blacklist);

$blacklist1= str_replace("\r", "", $blacklist1);
$arr_blacklist1  = explode("\n", $blacklist1);


$data= str_replace("\r", "", $data);
$arr_data = explode("\n", $data);



echo "data: ".count($arr_data).'<br>';
echo "blacklist: ".count($arr_blacklist).'<br>'; 
echo "blacklist1: ".count($arr_blacklist1).'<br>'; 

//loai phan tu trung lap
 $arr_data1=array_unique($arr_data);

 echo "sau loai trung: ".count($arr_data1).'<br>';
 $trunglap = count($arr_data) - count($arr_data1);
 echo "so trung lap: ". $trunglap.'<br>';


//loai bo blacklist
$arr_done = array_diff($arr_data1,$arr_blacklist);

echo "sau loc: ".count($arr_done).'<br>';

$f = count($arr_data1)-count($arr_done);
echo "loai backlist ".$f.'<br>';

//loai bo blacklist
$arr_done1 = array_diff($arr_done,$arr_blacklist1);

echo "sau loc: ".count($arr_done1).'<br>';

$f = count($arr_done)-count($arr_done1);
echo "loai backlist ".$f.'<br>';



$data_done =implode("\r", $arr_done1);


$file = fopen("D3/D3-1-done.txt","w");

fwrite($file,$data_done);
fclose($file);

 



?>