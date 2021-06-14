<?
	include "../common.php";
	$text1=$_REQUEST[text1];
	$page=$_REQUEST[page];

	 if(!$text1)
	$query="select * from test2 order by name17;";
  else
	$query="select * from test2 where name17 like '%$text1%' order by name17;";

  $result=mysqli_query($db,$query);
  if(!$result) exit("에러:$query");
  $count=mysqli_num_rows($result);
?>
<html>
<head>
	<title>직원 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<table width="450" border="0">
	<form name="form1" method="post" action="test2.php">
	<tr>
		<td width="300">
			이름 : <input type="text" name="text1" size="10" value="<?=$text1?>">
			<input type="button" value="검색" onClick="javascript:form1.submit();">
		</td>
		<td align="right"><a href="test2_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="450" bgcolor="#eeeeee" class="mytable">
  <tr bgcolor="#aaaaaa">
    <td width="100" align="center">이름</td>
    <td width="150" align="center">전화</td>
    <td width="100" align="center">수정/삭제</td>
    <td width="100" align="center">가족편집</td>
  </tr>
  <?
  if (!$page) $page=1;
$pages=ceil($count/$page_line);
$first = 1;
if ($count>0)$first=$page_line*($page-1);
$page_last=$count-$first;
if ($page_last>$page_line)$page_last=$page_line;
if ($count>0)mysqli_data_seek($result,$first);

  for($i=0; $i<$page_last; $i++)
	{
	$row=mysqli_fetch_array($result);
	$tel1=trim(substr($row[tel17],0,3));        
    $tel2=trim(substr($row[tel17],3,4));     
    $tel3=trim(substr($row[tel17],7,4));
	$tel = $tel1 . "-" . $tel2 . "-" . $tel3;  
  echo("<tr>
    <td width='100' align='center'>$row[name17]</td>
    <td width='150' align='center'>$tel</td>
    <td width='100' align='center'>
		<a href='test2_edit.php?no1=$row[no17]'>수정</a> / 
		<a href='test2_delete.php?no1=$row[no17]' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
	</td>
    <td width='100' align='center'>
		<a href='test2s.php?no1=$row[no17]'>가족편집</a>
	</td>
  </tr>");
	}
?>
</table>

<? $blocks = ceil($pages/$page_block);
	$block = ceil($page/$page_block);
	$page_s = $page_block * ($block-1);
	$page_e = $page_block * $block;
	if($blocks <= $block) $page_e=$pages;

	echo("<table width='630' border='0'> 
	<tr> 
		<td height='20' align='center'>");

	if($block > 1)
	{
		$tmp =$page_s;
		echo("<a href='test2_list.php?page=$tmp&text1=$text1'>
			<img src='images/i_prev.gif' align='absmiddle' border='0'>
		</a>&nbsp");
	}
	for($i=$page_s+1; $i<=$page_e; $i++)
	{
		if($page == $i)
			echo("<font color='red'><b>$i</b></font>&nbsp");
		else
			echo("<a href='test2_list.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	if ($block < $blocks)
	{
		$tmp = $page_e+1;
		echo("&nbsp<a href='test2_list.php?page=$tmp&text1=$text1'>
			<img src='images/i_next.gif' align='absmiddle' border='0'>
		</a>");
	}
	echo("   </td>
			</tr>
		  </table>");
	?>

</body>
</html>
