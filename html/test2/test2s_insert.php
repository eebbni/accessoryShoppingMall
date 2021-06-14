<?
include "../common.php";

$name=$_REQUEST[name];
$no1=$_REQUEST[no1];
$birthday1=$_REQUEST[birthday1];
$birthday2=$_REQUEST[birthday2];
$birthday3=$_REQUEST[birthday3];

$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

 $query="insert into test2s (name17,test_no17,birthday17)
	values ('$name','$no1','$birthday');";
  $result=mysqli_query($db,$query);
  if(!$result) exit("에러:$query");

  echo("<script>location.href='test2s.php?no1=$no1'</script>");
  ?>