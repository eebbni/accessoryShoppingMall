<?
	 
	 include "../common.php";
	 $no=$_REQUEST[no];
   $state=$_REQUEST[state];
	 $day1_y=$_REQUEST[day1_y];
$day1_m=$_REQUEST[day1_m];
$day1_d=$_REQUEST[day1_d];
$day2_y=$_REQUEST[day2_y];
$day2_m=$_REQUEST[day2_m];
$day2_d=$_REQUEST[day2_d];
$sel1=$_REQUEST[sel1];
$sel2=$_REQUEST[sel2];
$text1=$_REQUEST[text1];
$page=$_REQUEST[page];

	
	 $query="update jumun set state17='$state' where no17=$no;";
	 $result=mysqli_query($db,$query);
	 if (!$result) exit("¿¡·¯:$query"); 

	 echo("<script>location.href='jumun.php?day1_y=$day1_y&day1_m=$day1_m&day1_d=$day1_d&day2_y=$day2_y&day2_m=$day2_m&day2_d=$day2_d&sel1=$sel1&sel2=$sel2&text1=$text1&page=$page'</script>");
?>