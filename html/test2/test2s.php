<?
	include "../common.php";
	$no1=$_REQUEST[no1];
	$no2=$_REQUEST[no2];
	$query="select * from test2 where no17=$no1";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$row=mysqli_fetch_array($result);

?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<input type="hidden" name="no1" value="<?=$no1?>">

<table width="300" border="0">
	<tr>
		<td align="left"  width="300" valign="bottom">
			직원이름 : <font color="blue"><b><?=$row[name17]?></b></font>
		</td>
		<td align="right" width="200" valign="bottom">
			<a href="test2s_new.php?no1=<?=$no1?>">입력</a>
		</td>
	</tr>
</table>

<table width="300" bgcolor="#eeeeee" class="mytable">
  <tr bgcolor="#aaaaaa">
    <td width="100" align="center">가족이름</td>
    <td width="100" align="center">가족생일</td>
    <td width="100" align="center">수정/삭제</td>
  </tr>
  <tr>
  <? 
	
	$query="select * from test2s where test_no17=$no1 order by no17";
	$result=mysqli_query($db,$query);
	if(!$result) exit("에러:$query");
	$count=mysqli_num_rows($result);

	for($i=0; $i<$count; $i++)
	{
	$row1=mysqli_fetch_array($result);   
    echo("<td width='100' align='center'>$row1[name17]</td>
    <td width='100' align='center'>$row1[birthday17]</td>
    <td width='100' align='center'>
		<a href='test2s_edit.php?no1=$row1[test_no17]&no2=$row1[no17]'>수정</a> / 
		<a href='test2s_delete.php?no1=$row1[test_no17]&no2=$row1[no17]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
	</td>
  </tr>");
	}
	?>
</table>

<table width="300" border="0">
	 <tr height="35">
		<td align="center"> 
			<input type="button" value="가족 목록화면으로" onclick="javascript:location.href='test2.php';">
		</td>
	</tr>
</table>

</body>
</html>
