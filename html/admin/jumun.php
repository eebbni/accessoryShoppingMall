<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include "../common.php";
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
$state=$_REQUEST[state];
$day1=$_REQEUST[day1];
$day2=$_REQUEST[day2];

	if (!$sel1)   $sel1=0;
	if (!$sel2)   $sel2=0;
	 /*if (!$day1_y)   $day1_y=2019;
	if (!$day1_m)   $day1_m=0;
  if (!$day1_d)   $day1_d=0;
  if (!$day2_y)   $day2_y=2019;
  if (!$day2_m)   $day2_m=0;
  if (!$day2_d)   $day2_d=0;*/

	if (!$text1) $text1=""; 

  $day1=sprintf("%04d-%02d-%02d",$day1_y,$day1_m,$day1_d);
  $day2=sprintf("%04d-%02d-%02d",$day2_y,$day2_m,$day2_d);
  
  if($day1_y && $day1_m && $day1_d){$s[$k] = "jumunday17>='$day1'" ;  $k++; }
  if($day2_y && $day2_m && $day2_d){$s[$k] = "jumunday17<='$day2'" ;  $k++; }
  /*$k=0;

	
	$s[$k] = "state17=" . $day1_d;  $k++; 
  $s[$k] = "state17=" . $sel2;  $k++; 
  $s[$k] = "state17=" . $sel2;  $k++;
 

*/
if ($sel1!=0)
{
	
if($sel1 == 1)        { $s[$k] = "state17=" . $sel1; $k++; }
elseif($sel1 == 2)        { $s[$k] = "state17=" . $sel1; $k++; }
elseif($sel1 == 3)        { $s[$k] = "state17=" . $sel1; $k++; }
elseif($sel1 == 4)        { $s[$k] = "state17=" . $sel1; $k++; }
elseif($sel1 == 5)        { $s[$k] = "state17=" . $sel1; $k++; }
elseif($sel1 == 6)        { $s[$k] = "state17=" . $sel1; $k++; }
}

if ($text1)
{
    if ($sel2==0)       { $s[$k] = "no17 like '%" . $text1 . "%'"; $k++; }
    elseif ($sel2==1) { $s[$k] = "o_name17 like '%" . $text1 . "%'"; $k++; }
    elseif ($sel2==2) { $s[$k] = "product_names17 like '%" . $text1 . "%'"; $k++; }
}

if ($k> 0)
{
    $tmp=implode(" and ", $s); //$s값을 and로 묶는다
    $tmp = " where " . $tmp;//where로 조건을 만든다
}


?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
<script>
	function go_update(no,pos)
	{
		state=form1.state[pos].value;
		location.href="jumun_update.php?no="+no+"&state="+state+"&page="+form1.page.value+
			"&sel1="+form1.sel1.value+"&sel2="+form1.sel2.value+"&text1="+form1.text1.value+
			"&day1_y="+form1.day1_y.value+"&day1_m="+form1.day1_m.value+"&day1_d="+form1.day1_d.value+
			"&day2_y="+form1.day2_y.value+"&day2_m="+form1.day2_m.value+"&day2_d="+form1.day2_d.value;
	}
</script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>

<form name="form1" method="post" action="jumun.php">
<input type="hidden" name="page" value="0">

<table width="800" border="0" cellspacing="0" cellpadding="0">
	<tr height="40">
<?

   $query="select * from jumun" .$tmp." order by no17 desc;";
	 $result=mysqli_query($db,$query);
   if(!$result) exit("에러:$query");
  $count=mysqli_num_rows($result);
?>
		<td align="left"  width="70" valign="bottom">&nbsp 주문수 : <font color="#FF0000"><?=$count?></font></td>
		<td align="right" width="730" valign="bottom">
			기간 : 
			<?$day1_y=date("Y");?>
			<input type="text" name="day1_y" size="4" value="<?=$day1_y?>">
			<select name="day1_m">
				 <?for ($i=1; $i<$n_day1_m; $i++)
	{
	  if ($day1_m==$i)
       echo("<option value='$i' selected>$a_day1_m[$i]</option>");
    else
       echo("<option value='$i'>$a_day1_m[$i]</option>");
  }
   echo("</select>");?>
			</select>
			<select name="day1_d">
				<?for ($i=1; $i<$n_day1_d; $i++)
	{
	  if ($day1_d==$i)
       echo("<option value='$i' selected>$a_day1_d[$i]</option>");
    else
       echo("<option value='$i'>$a_day1_d[$i]</option>");
  }
   echo("</select>");
		 - 
		 $day2_y=date("Y");
		 $day2_m=date("m");
		 $day2_d=date("d");
?>
			<input type="text" name="day2_y" size="4" value="<?=$day2_y?>">
			<select name="day2_m">
				<?for ($i=1; $i<$n_day2_m; $i++)
	{
		
	  if ($day2_m==$i)
       echo("<option value='$i' selected>$a_day2_m[$i]</option>");
    else
       echo("<option value='$i'>$a_day2_m[$i]</option>");
  }
   echo("</select>");?>

			<select name="day2_d">
	<?
    for ($i=1; $i<$n_day2_d; $i++)
	{
	  if ($day2_d==$i)
       echo("<option value='$i' selected>$a_day2_d[$i]</option>");
    else
       echo("<option value='$i'>$a_day2_d[$i]</option>");
  }
   echo("</select>");?>&nbsp




			<select name="sel1">
			<?
  for ($i=0; $i<$n_state; $i++)
	{
	  if ($sel1==$i)
       echo("<option value='$i' selected>$a_state[$i]</option>");
    else
       echo("<option value='$i'>$a_state[$i]</option>");
  }
   echo("</select>");?>&nbsp 

			<select name="sel2">

	<? for ($i=0; $i<$n_jumun; $i++)
	{
	if ($sel2==$i)
       echo("<option value='$i' selected>$a_jumun[$i]</option>");
   else
       echo("<option value='$i'>$a_jumun[$i]</option>");
}
echo("</select>");
?>
			</select>
			<input type="text" name="text1" size="10" value="<?=$text1?>">&nbsp
			<input type="button" value="검색" onclick="javascript:form1.submit();"> &nbsp;
		</td>
	</tr>
	</tr><td height="5" colspan="2"></td></tr>
</table>


<table width="800" border="1" cellpadding="0" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC" height="23"> 
		<td width="70"  align="center">주문번호</td>
		<td width="70"  align="center">주문일</td>
		<td width="250" align="center">상품명</td>
		<td width="50"  align="center">제품수</td>	
		<td width="70"  align="center">총금액</td>
	    <td width="65"  align="center">주문자</td>
		<td width="50"  align="center">결재</td>
		<td width="135" align="center" colspan="2">주문상태</td>
	    <td width="50"  align="center">삭제</td>
	</tr>
<?
 
 for($i=0; $i<$count; $i++)
   {
  $row=mysqli_fetch_array($result);
  $total_cash=number_format($row[total_cash17]);
if($row[pay_method17]==0){
$pay_method="카드";
}
else{
$pay_method="무통장";
}
  $color="black";
      if($row[state17]==5) $color="blue";
      if($row[state17]==6) $color="red";

	echo("<tr bgcolor='#F2F2F2' height='23'> 
		<td width='70'  align='center'><a href='jumun_info.php?no=$row[no17]&color=$color'>$row[no17]</a></td>
		<td width='70'  align='center'>$row[jumunday17]</td>
		<td width='250' align='left'>&nbsp;$row[product_names17]</td>	
		<td width='40' align='center'>$row[product_nums17]</td>	
		<td width='70'  align='right'>$total_cash&nbsp</td>	
		<td width='65'  align='center'>$row[o_name17]</td>	
		<td width='50'  align='center'>$pay_method</td>	
		<td width='85' align='center' valign='bottom'>");

      
     
			echo("<select name='state' style='font-size:9pt; color:$color'>");
    
        for($j=1;$j<$n_state;$j++)
				{
			if ($j==$row[state17])
				echo("<option value='$j' selected>$a_state[$j]</option>");
			else
				echo("<option value='$j'>$a_state[$j]</option>");
				
}?>
	
	<?	echo("</select>&nbsp;
		</td>
		<td width='50' align='center'>
			<a href='javascript:go_update(\"$row[no17]\",\"$i\");'><img src='images/b_edit1.gif' border='0'></a>
		</td>	
		<td width='50' align='center'>
			<a href='jumun_delete.php?no=$row[no17]' onclick='javascript:return confirm(\"삭제할까요 ?\");'><img src='images/b_delete1.gif' border='0'></a>
		</td>
	</tr>
	");
}?>

	  
</table>

<input type="hidden" name="state">

<!--<table width="800" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" class="cmfont" align="center">
			<img src="images/i_prev.gif" align="absmiddle" border="0"> 
			<font color="#FC0504"><b>1</b></font>&nbsp;
			<a href="jumun.html?page=2&sel1=&sel2=&text1=&day1_y=&day1_m=&day1_d=&day2_y=&day2_m=&day2_d="><font color="#7C7A77">[2]</font></a>&nbsp;
			<a href="jumun.html?page=3&sel1=&sel2=&text1=&day1_y=&day1_m=&day1_d=&day2_y=&day2_m=&day2_d="><font color="#7C7A77">[3]</font></a>&nbsp;
			<img src="images/i_next.gif" align="absmiddle" border="0">
		</td>
	</tr>
</table>
-->
</form>

</center>

</body>
</html>