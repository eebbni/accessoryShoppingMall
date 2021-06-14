<?
include "../common.php";
$no1=$_REQUEST[no1];
$query="select * from test2 where no17=$no1;";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");
	$row=mysqli_fetch_array($result);

	$tel1=trim(substr($row[tel17],0,3));        // 0번 위치에서 3자리 문자열 추출
	$tel2=trim(substr($row[tel17],3,4));        // 3번 위치에서 4자리
	$tel3=trim(substr($row[tel17],7,4));   
?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<body>

<form name="form1" method="post" action="test2_update.php">

<input type="hidden" name="no1" value="<?=$row[no17]?>">

<table width="500" bgcolor="#eeeeee" class="mytable">
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">이름</td>
    <td width="400" align="left">
      <input type="text" name="name" size="10" value="<?=$row[name17]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#aaaaaa">전화</td>
    <td width="400" align="left">

      <input type="text" name="tel1" size="3" maxlength="3" value="<?=$tel1?>"> -
      <input type="text" name="tel2" size="4" maxlength="4" value="<?=$tel2?>"> -
      <input type="text" name="tel3" size="4" maxlength="4" value="<?=$tel3?>">
    </td>
  </tr>
</table>

<table width="500" border="0">
  <tr height="35">
    <td align="center"> 
		<input type="submit" value="수정"> &nbsp
		<input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>