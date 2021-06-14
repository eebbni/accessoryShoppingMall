<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
	$cart = $_COOKIE[cart];
	$n_cart = $_COOKIE[n_cart];
?>

<html>
<head>
	<title>주소록 프로그램</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>
<!-------자바스크립트 추가-------->
			<script language = "javascript">

			function cart_edit(kind,pos) {
				if (kind=="deleteall") 
				{
					location.href = "juso_all.php?kind=deleteall";
				} 
				else if (kind=="delete")	{
					location.href = "juso_all.php?kind=delete&pos="+pos;
				} 
				else if (kind=="insert")	{
					var num=eval("form2.num"+pos).value;
					location.href = "juso_all.php?kind=insert&pos="+pos+"&num="+num;
				}
				else if (kind=="update")	{
					var num=eval("form2.num"+pos).value;
					location.href = "juso_all.php?kind=update&pos="+pos+"&num="+num;
				}
			}

			</script>
<!------------------------->

<table width="600" border="0">
	<form name="form1" method="post" action="juso_list_1.php">
	<tr>
		<td width="400">&nbsp
			이름 : <input type="text" name="text1" size="10" value="">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align="right"><a href="juso_new_1.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="600" border="1" cellpadding="2" style="border-collapse:collapse">
  <tr bgcolor="lightblue">
    <td width="70"  align="center">이름</td>
    <td width="100"  align="center">전화</td>
    <td width="50"  align="center">음/양</td>
    <td width="80"  align="center">생일</td>
    <td width="250" align="center">주소</td>
    <td width="50"  align="center">삭제</td>
  </tr>
<?
if (!$n_cart) $n_cart=0;
   for ($i=1;  $i<=$n_cart;  $i++)
     {
   if ($cart[$i])
     {
	   list($name, $tel, $sm, $birthday,$juso)=explode("^", $cart[$i]);

	$tel1=trim(substr($tel,0,3));        
    $tel2=trim(substr($tel,3,4));     
    $tel3=trim(substr($tel,7,4));
	$tel = $tel1 . "-" . $tel2 . "-" . $tel3;  
	if ($sm==0) $sm="양력"; else $sm="음력";

 echo(" <tr bgcolor='lightyellow'>
    <td width='70'  align='center'><a href='juso_edit_1.php?no=$i'>$name</a></td>
    <td width='100'  align='center'>$tel</td>
    <td width='50'  align='center'>$sm</td>
    <td width='80'  align='center'>$birthday</td>
    <td width='250' align='left'>$juso</td>
    <td width='50'  align='center'>
		<a href = 'javascript:cart_edit(\"delete\",\"$i\")' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
	</td>
  </tr>
  ");
	 }
	 }?>
</table>

<table width="600" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30" align="center">
			<img src="images/i_prev.gif" align="absmiddle" border="0"> 
			<font color="#FC0504"><b>1</b></font>&nbsp;
			<a href="juso_list.html?page=2&text1="><font color="#7C7A77">[2]</font></a>&nbsp;
			<a href="juso_list.html?page=3&text1="><font color="#7C7A77">[3]</font></a>&nbsp;
			<img src="images/i_next.gif" align="absmiddle" border="0">
		</td>
	</tr>
</table>

</body>
</html>
