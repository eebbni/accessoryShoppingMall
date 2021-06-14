<?
include "common.php";

$uid=$_REQUEST[uid];
$pwd=$_REQUEST[pwd];
$name=$_REQUEST[name];
$tel1=$_REQUEST[tel1];
$tel2=$_REQUEST[tel2];
$tel3=$_REQUEST[tel3];
$sm=$_REQUEST[sm];
$birthday1=$_REQUEST[birthday1];
$birthday2=$_REQUEST[birthday2];
$birthday3=$_REQUEST[birthday3];
$phone1=$_REQUEST[phone1];
$phone2=$_REQUEST[phone2];
$phone3=$_REQUEST[phone3];
$email=$_REQUEST[email];
$zip=$_REQUEST[zip];
$juso=$_REQUEST[juso];

$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);
$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);
$phone=sprintf("%-3s%-4s%-4s", $phone1,$phone2,$phone3);

 $query="insert into member (uid17,pwd17,name17,tel17,sm17,birthday17,phone17,email17,zip17,juso17,gubun17)
	values ('$uid','$pwd','$name','$tel','$sm','$birthday','$phone','$email','$zip','$juso',0);";
	
// $query="insert into member (uid17,pwd17,name17,tel17,sm17,birthday17,phone17,email17,zip17,juso17,gubun17)
	//values ('$uid','$pwd','$name','$tel','$sm','$birthday','$phone','$email','$zip','$juso',0);";
  $result=mysqli_query($db,$query);
  if(!$result) exit("에러:$query");

  echo("<script>location.href='member_joinend.php'</script>");
  ?>