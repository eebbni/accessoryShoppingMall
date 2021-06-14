<?
include "../common.php";

$name=$_REQUEST[name];
$tel1=$_REQUEST[tel1];
$tel2=$_REQUEST[tel2];
$tel3=$_REQUEST[tel3];

$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);

 $query="insert into test2 (name17,tel17)
	values ('$name','$tel');";
  $result=mysqli_query($db,$query);
  if(!$result) exit("에러:$query");

  echo("<script>location.href='test2.php'</script>");
  ?>