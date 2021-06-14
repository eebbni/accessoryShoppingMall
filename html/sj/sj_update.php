<?
include "common.php";

$no=$_REQUEST[no];
$name=$_REQUEST[name];
$kor=$_REQUEST[kor];
$eng=$_REQUEST[eng];
$mat=$_REQUEST[mat];
$hap=$_REQUEST[hap];
$avg=$_REQUEST[avg];
$query="update sj set name17='$name', kor17=$kor, eng17=$eng, mat17=$mat, hap17=$hap, avg17=$avg where no17=$no;";
$result=mysqli_query($db,$query);
if (!$result) exit("에러:$query");

echo("<script>location.href='sj_list.php'</script>");
?>