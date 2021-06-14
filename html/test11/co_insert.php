<?
include "common.php";

$coname=$_REQUEST[coname];
$phone1=$_REQUEST[phone1];
$phone2=$_REQUEST[phone2];
$phone3=$_REQUEST[phone3];
$gubun=$_REQUEST[gubun];
$startday1=$_REQUEST[startday1];
$startday2=$_REQUEST[startday2];
$startday3=$_REQUEST[startday3];
$address=$_REQUEST[address];

$phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);
$startday = sprintf("%04d-%02d-%02d", $startday1, $startday2, $startday3);

 $query="insert into co (coname17,phone17,gubun17,startday17,address17)
	values ('$coname','$phone','$gubun','$startday','$address');";
  $result=mysqli_query($db,$query);
  if(!$result) exit("에러:$query");

  echo("<script>location.href='co_list.php'</script>");
  ?>