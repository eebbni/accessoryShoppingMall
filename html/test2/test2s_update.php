<?	 
	 include "../common.php";
	 $no1=$_REQUEST[no1];
	 $no2=$_REQUEST[no2];
	 $name=$_REQUEST[name];
	 $birthday1=$_REQUEST[birthday1];
	$birthday2=$_REQUEST[birthday2];
	$birthday3=$_REQUEST[birthday3];
	
	$birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	 $query="update test2s set name17='$name',birthday17='$birthday' where no17=$no2;";
	 $result=mysqli_query($db,$query);
	 if (!$result) exit("에러:$query"); 

	 echo("<script>location.href='test2s.php?no1=$no1'</script>");
	
	 ?>