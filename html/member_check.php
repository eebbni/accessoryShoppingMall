<?	
	include "common.php";
	$uid =$_POST[uid];
	$pwd=$_POST[pwd];	

	 $query="select no17, name17 from member where uid17='$uid' and pwd17='$pwd'";
     $result = mysqli_query($db,$query);
     if (!$result) exit("¿¡·¯: $query");
     $count = mysqli_num_rows($result);

	 if ($count>0) {
	 $row = mysqli_fetch_array($result);
	 $cookie_no = $row[no17];
	 $cookie_name = $row[name17];
     setcookie("cookie_no",$cookie_no);
	 setcookie("cookie_name",$cookie_name);

    echo("<script>location.href='index.html'</script>");}
	else
	{
	echo("<script>location.href='member_login.php'</script>");}
?>