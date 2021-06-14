<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include "../common.php";
$no=$_REQUEST[no];
$color=$_REQUEST[color];

$query="select * from jumun where no17=$no;"; 
$result=mysqli_query($db,$query);
if(!$result) exit("에러:$query");
$row=mysqli_fetch_array($result);

?>
<html>
<head>
<title>쇼핑몰 홈페이지</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="include/font.css">
<script language="JavaScript" src="include/common.js"></script>
</head>

<body style="margin:0">

<center>

<br>
<script> document.write(menu());</script>
<br>
<br>

<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
<?
for($i=0;$i<$n_state;$i++){
if($row[state17]==$i){
$state=$a_state[$i];
}
}
?>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문번호</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE">&nbsp;<font size="3"><b><?=$row[no17]?> (<font color="<?=$color?>"><?=$state?></font>)</b></font></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문일</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[jumunday17]?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 

        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자</font></td>
        
<?
if($row[member_no17]==0){
echo("<td width='300' height='20' bgcolor='#EEEEEE'>$row[o_name17] (비회원)</td>");
}
else
echo("<td width='300' height='20' bgcolor='#EEEEEE'>$row[o_name17]</td>");

$tel1=trim(substr($row[o_tel17],0,3));        
    $tel2=trim(substr($row[o_tel17],3,4));     
    $tel3=trim(substr($row[o_tel17],7,4));
	$o_tel = $tel1 . "-" . $tel2 . "-" . $tel3;

$phone1=trim(substr($row[o_phone17],0,3));        
    $phone2=trim(substr($row[o_phone17],3,4));     
    $phone3=trim(substr($row[o_phone17],7,4));
	$o_phone = $phone1 . "-" . $phone2 . "-" . $phone3;

$tel1=trim(substr($row[r_tel17],0,3));        
    $tel2=trim(substr($row[r_tel17],3,4));     
    $tel3=trim(substr($row[r_tel17],7,4));
	$r_tel = $tel1 . "-" . $tel2 . "-" . $tel3;
      
$phone1=trim(substr($row[r_phone17],0,3));        
    $phone2=trim(substr($row[r_phone17],3,4));     
    $phone3=trim(substr($row[r_phone17],7,4));
	$r_phone = $phone1 . "-" . $phone2 . "-" . $phone3;  
?>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[o_email17]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$o_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">주문자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[o_zip17]?>) <?=$row[o_juso17]?></td>
	</tr>
	</tr>
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_name17]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자전화</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_tel?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자 E-Mail</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$row[r_email17]?></td>
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자핸드폰</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE"><?=$r_phone?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">수신자주소</font></td>
        <td width="300" height="20" bgcolor="#EEEEEE" colspan="3">(<?=$row[r_zip17]?>) <?=$row[r_juso17]?></td>
	</tr>
	<tr> 
        <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">메모</font></td>
        <td width="300" height="50" bgcolor="#EEEEEE" colspan="3"><?=$row[memo17]?></td>
	</tr>
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
<?
if($row[pay_method17]==0){
  if($row[card_hallbu17]==0){
$card_halbu="일시불";
}
else if($row[card_hallbu17]==3){
$card_halbu="3개월";
}
else if($row[card_hallbu17]==6){
$card_halbu="6개월";
}
else if($row[card_hallbu17]==9){
$card_halbu="9개월";
}
else if($row[card_hallbu17]==12){
$card_halbu="12개월";
}

        echo("<td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>지불종류</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>카드</td>
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드승인번호 </font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>12345678&nbsp</td>
	</tr>
	<tr> 
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드 할부</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$card_halbu</td>
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>카드종류</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>개인</td>
	</tr>");}

else{
if($row[bank_kind17]==1){
$bank_kind="국민은행";
}
else{
$bank_kind="신한은행";
}
echo("<tr> 
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>무통장</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$bank_kind:000-00000-0000</td>
        <td width='100' height='20' bgcolor='#CCCCCC' align='center'><font color='#142712'>입금자이름</font></td>
        <td width='300' height='20' bgcolor='#EEEEEE'>$row[r_name17]</td>
	</tr>");
}?>

	
</table>
<br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr bgcolor="#CCCCCC"> 
    <td width="340" height="20" align="center"><font color="#142712">상품명</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">수량</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">단가</font></td>
		<td width="70"  height="20" align="center"><font color="#142712">금액</font></td>
		<td width="50"  height="20" align="center"><font color="#142712">할인</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션1</font></td>
		<td width="60"  height="20" align="center"><font color="#142712">옵션2</font></td>
	</tr>
<?
$query=" select opts1.name17 as opts1_name17,opts2.name17 as opts2_name17,product.name17 as product_name17,jumuns.num17 as num17 ,jumuns.price17 as price17 ,jumuns.cash17 as cash17,jumuns.discount17 as discount17 ,jumuns.product_no17 as product_no from  jumuns,  product,  opts as opts1, opts as opts2 where  jumuns.product_no17=product.no17 and jumuns.opts_no117=opts1.no17 and jumuns.opts_no217=opts2.no17 and jumuns.jumun_no17  ='$no';";
$result=mysqli_query($db,$query);
if(!$result) exit("에러:$query");
$count=mysqli_num_rows($result);

 for($i=0; $i<$count; $i++)
{
  $row=mysqli_fetch_array($result);
  $price=number_format($row[price17]);
  $cash=number_format($row[cash17]);

echo("<tr bgcolor='#EEEEEE' height='20'>	
		<td width='340' height='20' align='left'>$row[product_name17]</td>	
		<td width='50'  height='20' align='center'>$row[num17]</td>	
		<td width='70'  height='20' align='right'>$price</td>	
		<td width='70'  height='20' align='right'>$cash</td>	
		<td width='50'  height='20' align='center'>$row[discount17] %</td>	
		<td width='60'  height='20' align='center'>$row[opts1_name17]</td>	
		<td width='60'  height='20' align='center'>$row[opts2_name17]</td>	
	</tr>");
}
 
$query=" select * from jumuns where jumun_no17='$no';";
$result=mysqli_query($db,$query);
if(!$result) exit("에러:$query");
$count=mysqli_num_rows($result);

 for($i=0; $i<$count; $i++)
{
$row=mysqli_fetch_array($result);

if($row[product_no17]==0){echo("<tr bgcolor='#EEEEEE' height='20'>	
		<td width='340' height='20' align='left'>택배비</td>	
		<td width='50'  height='20' align='center'>1</td>	
		<td width='70'  height='20' align='right'>$baesongbi</td>	
		<td width='70'  height='20' align='right'>$baesongbi</td>	
		<td width='50'  height='20' align='center'> </td>	
		<td width='60'  height='20' align='center'> </td>	
		<td width='60'  height='20' align='center'> </td>	
	</tr>");
  }

}
?>
	
</table>
<img src="blank.gif" width="10" height="5"><br>
<table width="800" border="1" cellpadding="2" style="border-collapse:collapse">
	<tr> 
<?
$query="select * from jumun where no17=$no;"; 
$result=mysqli_query($db,$query);
if(!$result) exit("에러:$query");
$row=mysqli_fetch_array($result);

 $total=number_format($row[total_cash17]);
?>
	  <td width="100" height="20" bgcolor="#CCCCCC" align="center"><font color="#142712">총금액</font></td>
		<td width="700" height="20" bgcolor="#EEEEEE" align="right"><font color="#142712" size="3"><b><?=$total?></b></font> 원&nbsp;&nbsp</td>
	</tr>
</table>

<table width="800" border="0" cellspacing="0" cellpadding="7">
	<tr> 
		<td align="center">
			<input type="button" value="이 전 화 면" onClick="javascript:history.back();">&nbsp
			<input type="button" value="프린트" onClick="javascript:print();">
		</td>
	</tr>
</table>

</center>

<br>
</body>
</html>
