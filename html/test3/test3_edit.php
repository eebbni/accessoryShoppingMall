<?
	$data = $_COOKIE[data];
	$n_data = $_COOKIE[n_data];
	$no1=$_REQUEST[no1];
	list($no,$name,$num)=explode("^^", $data[$no1]);
?>
<html>
<head>
	<title>쿠키 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<body>

<form name="form1" method="post" action="test3_all.php">

<input type="hidden" name="no1" value="<?=$no1?>">
<input type="hidden" name="kind" value="update">

<table width="500"  bgcolor="#99cccc" class="mytable">
  <tr>
    <td width="100" align="center" bgcolor="#6699ff">쿠키번호</td>
    <td width="400" align="left"><?=$no?></td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#6699ff">제품명</td>
    <td width="400" align="left">
      <input type="text" name="name" size="15" value="<?=$name?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#6699ff">수량</td>
    <td width="400" align="left">
      <input type="text" name="num" size="15" value="<?=$num?>">
    </td>
  </tr>
</table>

<table width="500" border="0">
  <tr height="35">
    <td align="center"> 
		<input type="submit" value="저장"> &nbsp
		<input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>