<?
$data = $_COOKIE[data];
//$a=$_COOKIE[a] 라고 쓰면 $a[0]이나 $a[1] 값을 사용할 수 있다.
$n_data = $_COOKIE[n_data];
?>

<html>
<head>
	<title>쿠키 프로그램</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="font.css">
</head>
<body>

<script language = "javascript">

			function cart_edit(kind,pos) {
				if (kind=="delete")	{
					location.href = "test3_all.php?kind=delete&pos="+pos;
				} 
				else if (kind=="insert")	{
					var num=eval("form2.num"+pos).value;
					location.href = "test3_all.php?kind=insert&pos="+pos+"&num="+num;
				}
				else if (kind=="update")	{
					var num=eval("form2.num"+pos).value;
					location.href = "test3_all.php?kind=update&pos="+pos+"&num="+num;
				}
			}

			</script>

<table width="500" border="0">
	<form name="form1" method="post" action="test3.php">
	<tr>
		<td align="right"><a href="test3_new.html">입력</a>&nbsp</td>
	</tr>
	</form>
</table>

<table width="500" bgcolor="#99cccc" class="mytable">
  <tr bgcolor="#6699ff">
    <td width="100" align="center">쿠키번호</td>
    <td width="200" align="center">제품명</td>
    <td width="100" align="center">수량</td>
    <td width="100" align="center">수정/삭제</td>
  </tr>
  <?
    
    if (!$n_data) $n_data=0;
      for ($i=1;  $i<=$n_data;  $i++)
       {
      if ($data[$i]){
		list($no, $name, $num)=explode("^^", $data[$i]);
  echo("<tr>
    <td width='100' align='center'>$no</td>
    <td width='200' align='center'>$name</td>
    <td width='100' align='center'>$num</td>
    <td width='100' align='center'>
		<a href='test3_edit.php?no1=$i'>수정</a> / 
		<a href = 'javascript:cart_edit(\"delete\",\"$i\")' onClick='javascript:return confirm(\"삭제할까요 ?\");'>삭제</a>
	</td>
  </tr>");
	  }
	   }
	   ?>
</table>

</body>
</html>
