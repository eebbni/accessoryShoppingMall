<?
include "common.php";
include"main_top.php";
$findtext=$_REQUEST[findtext];
$page=$_REQUEST[page];
$query = "select * from product where name17 like '%$findtext%' order by name17";
$result=mysqli_query($db,$query);
if (!$result) exit("에러:$query");
$count=mysqli_num_rows($result);

 
?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language="javascript">
				function SearchProduct() {
					form2.submit();
				}
			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
			  <tr><td height="13"></td></tr>
			  <tr>
			    <td height="30" align="center"><p><img src="images/search_title.gif" width="746" height="30" border="0" /></p></td>
			  </tr>
			  <tr><td height="13"></td></tr>
			</table>

			<table width="730" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" valign="middle" colspan="3" height="5">
						<table border="0" cellpadding="0" cellspacing="0" width="690">
							<tr><td class="cmfont"><img src="images/search_title1.gif" border="0"></td></tr>
      			  <tr><td height="10"></td></tr>
			      </table>
					</td>
				</tr>
				<tr>
					<td width="730" align="center" valign="top" bgcolor="#FFFFFF"> 

        
						<table width="686" border="0" cellpadding=0 cellspacing=0 class="cmfont">
							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
							<tr height="29" bgcolor="EEEEEE"> 
								<td width="80"  align="center">그림</td>
								<td align="center">상품명</td>
								<td width="150" align="right">가격</td>
								<td width="20"></td>
							</tr>
							<tr bgcolor="8B9CBF"><td height="1" colspan="5"  bgcolor="AAAAAA"></td></tr>

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
							$price1=number_format($row[price17]);
							echo("<tr height='70'>
								<td width='80' align='center' valign='middle'>
									<a href='product_detail.php?no=$row[no17]'><img src='product/$row[image117]' width='60' height='60' border='0'></a>
								</td>

								<td align='left' valign='middle'>
									<a href='product_detail.php?no=$row[no17]'><font color='#4186C7'><b>$row[name17]</b></font></a><br>");

									if($row[icon_hit17]==1){
									echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
									}
									if($row[icon_new17]==1){
									echo("<img src='images/i_new.gif' align='absmiddle' vspace='1'>");
									}

								if($row[icon_sale17]==1){

								echo("<img src='images/i_sale.gif' align='absmiddle' vspace='1'> <font color='red'>$row[discount17]%</font>");

								$price=number_format(round($row[price17]*(100-$row[discount17])/100, -1) );	

								echo("</td>
								<td width='150' align='right' valign='middle'><strike>$price 원</strike><br>$price1 원</td>
								<td width='20'></td>");}
							else
								{
								echo("</td>
								<td width='150' align='right' valign='middle'>$price1 원</td>
								<td width='20'></td>");
							}
								
							
							}
									?>
							<tr><td align="center" valign="middle" colspan="5" height="1" background="images/ln1.gif"></td></tr>
							
								
							<tr bgcolor="8B9CBF"><td height="3" colspan="5"></td></tr>
						</table>
					</td>
				</tr>
			</table>
			
			<?
	$blocks = ceil($pages/$page_block);
	$block = ceil($page/$page_block);
	$page_s = $page_block * ($block-1);
	$page_e = $page_block * $block;
	if($blocks <= $block) $page_e=$pages;

	echo("<table width='690' border='0'> 
	<tr> 
		<td height='20' align='center'>");

	if($block > 1)
	{
		$tmp =$page_s;
		echo("<a href='product_search.php?page=$tmp&text1=$text1'>
			<img src='images/i_prev.gif' align='absmiddle' border='0'>
		</a>&nbsp");
	}
	for($i=$page_s+1; $i<=$page_e; $i++)
	{
		if($page == $i)
			echo("<font color='red'><b>$i</b></font>&nbsp");
		else
			echo("<a href='product_search.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	if ($block < $blocks)
	{
		$tmp = $page_e+1;
		echo("&nbsp<a href='product_search.php?page=$tmp&text1=$text1'>
			<img src='images/i_next.gif' align='absmiddle' border='0'>
		</a>");
	}
	echo("   </td>
			</tr>
		  </table>");
	?>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
include "main_bottom.php";
?>