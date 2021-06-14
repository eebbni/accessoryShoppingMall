<?	 
	include "../common.php";
	$no1=$_REQUEST[no1];
	$name=$_REQUEST[name];
	$tel1=$_REQUEST[tel1];
	$tel2=$_REQUEST[tel2];
	$tel3=$_REQUEST[tel3];

$tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);

	 $query="update test2 set name17='$name',tel17='$tel' where no17=$no1;";
	 $result=mysqli_query($db,$query);
	 if (!$result) exit("에러:$query"); 

	 echo("<script>location.href='test2.php'</script>");
	
	 ?>