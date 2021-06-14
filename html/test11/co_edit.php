<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2.4)                                                           -->
<!-------------------------------------------------------------------------------------------->	
<?
include "common.php";
?>
<html>
<head>
	<title>주소록 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>

<body>
<? $no=$_REQUEST[no];
	
	$query="select * from co where no17=$no;";
	$result=mysqli_query($db,$query);
	if (!$result) exit("에러:$query");
	$row=mysqli_fetch_array($result);

    $phone1=trim(substr($row[phone17],0,3));        // 0번 위치에서 3자리 문자열 추출
	$phone2=trim(substr($row[phone17],3,4));        // 3번 위치에서 4자리
	$phone3=trim(substr($row[phone17],7,4));       
	$startday1=substr($row[startday17],0,4);            
	$startday2=substr($row[startday17],5,2);
	$startday3=substr($row[startday17],8,2);
				
?>
<form name="form1" method="post" action="co_update.php">
<input type="hidden" name="no" value="<?=$no?>">
<input type="hidden" name="page" value="">
<input type="hidden" name="text1" value="">

<form name="form1" method="post" action="co_insert.php">
<table width="500" border="1" cellpadding="1" cellspacing="0" bgcolor="#DDDDDD">
  <tr>
    <td width="100" align="center" bgcolor="#555555"><font color="white">거래처명</font></td>
    <td width="400" align="left">&nbsp
      <input type="text" name="coname" size="40" value="<?=$row[coname17]?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#555555"><font color="white">전화</font></td>
    <td width="400" align="left">&nbsp
      <input type="text" name="phone1" size="3" value="<?=$phone1?>">-
      <input type="text" name="phone2" size="4" value="<?=$phone2?>">-
      <input type="text" name="phone3" size="4" value="<?=$phone3?>">
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#555555"><font color="white">창립일</font></td>
    <td width="400" align="left">&nbsp
      <input type="text" name="startday1" size="4" value="<?=$startday1?>">-
      <input type="text" name="startday2" size="2" value="<?=$startday2?>">-
      <input type="text" name="startday3" size="2" value="<?=$startday3?>"> 
			&nbsp;&nbsp 
			<?
	if($row[gubun17]==0)
		echo("
      <input type='radio' name='gubun' value='0' checked>소매
      <input type='radio' name='gubun' value='1'>도매");
	else
		echo("
      <input type='radio' name='gubun' value='0'>소매
      <input type='radio' name='gubun' value='1' checked>도매");
	  ?>
    </td>
  </tr>
  <tr>
    <td width="100" align="center" bgcolor="#555555"><font color="white">주소</font></td>
    <td width="400" align="left">&nbsp
      <input type="text" name="address" size="50" value="<?=$row[address17]?>">
    </td>
  </tr>
</table>
<br>
<table width="500" border="0">
  <tr>
    <td align="center"> 
		<input type="submit" value="수정"> &nbsp
		<input type="button" value="이전화면으로" onclick="javascript:history.back();">
	</td>
  </tr>
</table>
</form>

</body>
</html>