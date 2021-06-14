<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2.4)                                                           -->
<!-------------------------------------------------------------------------------------------->	
<? include "common.php"; 
	$text1=$_REQUEST[text1];
	$page=$_REQUEST[page];
	?>
<html>
<head>
	<title>거래처 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="750" border="0">
	<form name="form1" method="post" action="co_list.php">
	<tr>
		<td width="300">&nbsp
			거래처명 : <input type="text" name="text1" size="10" value="<?=$text1?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
    <td align="right"><a href="co_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="750"  border="1" cellpadding="1" cellspacing="0">
  <tr bgcolor="#555555">
    <td width="150" align="center"><font color="white">거래처명</font></td>
    <td width="100" align="center"><font color="white">전화</font></td>
    <td width="100" align="center"><font color="white">소매/도매</font></td>
    <td width="100" align="center"><font color="white">창립일</font></td>
    <td width="250" align="center"><font color="white">주소</font></td>
    <td width="50"  align="center"><font color="white">삭제</font></td>
  </tr>
  <? 
  if(!$text1)
	$query="select * from co order by coname17;";
  else
	$query="select * from co where coname17 like '%$text1%' order by coname17;";

  $result=mysqli_query($db,$query);
  if(!$result) exit("에러:$query");
  $count=mysqli_num_rows($result);

if (!$page) $page=1;
$pages=ceil($count/$page_line);
$first = 1;
if ($count>0)$first=$page_line*($page-1);
$page_last=$count-$first;
if ($page_last>$page_line)$page_last=$page_line;
if ($count>0)mysqli_data_seek($result,$first);

for($i=0; $i<$page_last; $i++)//page_last확인
	{
	$row=mysqli_fetch_array($result);
	if ($row[gubun17]==0) $gubun="소매"; else $gubun="도매";
	$phone1=trim(substr($row[phone17],0,3));        
    $phone2=trim(substr($row[phone17],3,4));     
    $phone3=trim(substr($row[phone17],7,4));
	$phone = $phone1 . "-" . $phone2 . "-" . $phone3;
	echo("<tr bgcolor='#DDDDDD'>
    <tr bgcolor='#DDDDDD'>
    <td width='150' align='left'>&nbsp<a href='co_edit.php?no=$row[no17]&page=1&text1='>$row[coname17]</a></td>
    <td width='100' align='center'>$phone</td>
    <td width='100' align='center'>$gubun</td>
    <td width='100' align='center'>$row[startday17]</td>
    <td width='250' align='left'>&nbsp $row[address17]</td>
    <td width='50'  align='center'>
			<a href='co_delete.php?no=$row[no17]&page=1&text1=' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
		</td>
  </tr>");
	}
?> 
  
  
</table>

<?
	$blocks = ceil($pages/$page_block);
	$block = ceil($page/$page_block);
	$page_s = $page_block * ($block-1);
	$page_e = $page_block * $block;
	if($blocks <= $block) $page_e=$pages;

	echo("<table width='750' border='0'> 
	<tr> 
		<td height='30' align='center'>");

	if($block > 1)
	{
		$tmp =$page_s;
		echo("<a href='co_list.php?page=$tmp&text1=$text1'>
			<img src='images/i_prev.gif' align='absmiddle' border='0'>
		</a>&nbsp");
	}
	for($i=$page_s+1; $i<=$page_e; $i++)
	{
		if($page == $i)
			echo("<font color='red'><b>$i</b></font>&nbsp");
		else
			echo("<a href='co_list.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	if ($block < $blocks)
	{
		$tmp = $page_e+1;
		echo("&nbsp<a href='co_list.php?page=$tmp&text1=$text1'>
			<img src='images/i_next.gif' align='absmiddle' border='0'>
		</a>");
	}
	echo("   </td>
			</tr>
		  </table>");
	?>


</table>


</body>
</html>
