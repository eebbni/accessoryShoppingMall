<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?
include "common.php";
include "main_top.php";

$menu=$_REQUEST[menu];
$sort=$_REQUEST[sort];

if ($sort=='1')            // 고가격순
		$query="select * from product where status17=1 and menu17=$menu order by price17 desc";
	elseif ($sort=='2')  // 저가격순
		$query="select * from product where status17=1 and menu17=$menu order by price17";
	elseif ($sort=='3')  // 이름순
		$query="select * from product where status17=1 and menu17=$menu order by name17";
	else                              // 신상품순
		$query="select * from product where status17=1 and menu17=$menu order by no17 desc";

$result=mysqli_query($db,$query); 
 if (!$result) exit("에러:$query");
 $count=mysqli_num_rows($result);
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

      <!-- 하위 상품목록 -->

			<!-- form2 시작 -->
			<form name="form2" method="post" action="product.php">
			<input type="hidden" name="menu" value="<?=$menu?>">

			<table border="0" cellpadding="0" cellspacing="5" width="9" class="cmfont" bgcolor="#efefef" align="center">
				<tr>
					<td bgcolor="white" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="751" class="cmfont">
							<tr>
								<td align="center" valign="middle">
									<table border="0" cellpadding="0" cellspacing="0" width="730" height="40" class="cmfont">
										<tr>
											<td width="500" class="cmfont">
											<?
											for($i=0;$i<=$n_menu;$i++){
											if($menu==$i){
												echo("<font color='#C83762' class='cmfont'><b>$a_menu[$i] &nbsp</b></font>&nbsp");
											}
											}
											?>
											</td>
											<td align="right" width="274">
												<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
													<tr>
														<td align="right"><font color="EF3F25"><b><?=$count?></b></font> 개의 상품.&nbsp;&nbsp;&nbsp</td>
														<td width="50">
<? echo("<select name='sort' size=1 class='cmfont' onChange='form2.submit()'>");
	for($i=0;$i<$n_sort;$i++)
	{
    if ($i==$sort)
       echo("<option value='$i' selected>$a_sort[$i]</option>");
    else
       echo("<option value='$i'>$a_sort[$i]</option>");
	}
		echo("</select>");
?>
				
															
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 -->

			
				<!--- 1 번째 줄 -->
<?
$num_col=3; $num_row=4;                // column수, row수
$page_line=$num_col*$num_row;       // 1페이지에 출력할 제품수
$icount=0;

if (!$page) $page=1;
$pages=ceil($count/$page_line);
$first = 1;
if ($count>0)$first=$page_line*($page-1);
$page_last=$count-$first;
if ($page_last>$page_line)$page_last=$page_line;
if ($count>0)mysqli_data_seek($result,$first);

echo("<table border='0' cellpadding='0' cellspacing='0' align='center'>");
for ($ir=0;  $ir<$num_row;  $ir++)
{
     echo("<tr>");
     for ($ic=0;  $ic<$num_col;  $ic++)
     {
          if ($icount <= $page_last-1 )
         {
              $row=mysqli_fetch_array($result);
			   $price1=number_format($row[price17]);
              echo("<td width='250' height='205' align='center' valign='top'>

						<table border='0' cellpadding='0' cellspacing='0' width='100' class='cmfont'>

							<tr> 

								<td align='center'> 

									<a href='product_detail.php?no=$row[no17]'><img src='product/$row[image117]' width='150' height='170' border='0'></a>

								</td>

							</tr>

							<tr><td height='15'></td></tr>

							<tr> <br><br>

								<td height='20' align='center'>

									<a href='product_detail.php?no=1'><font color='444444'>$row[name17]</font></a><br><br>&nbsp; ");

									/*if($row[icon_hit17]==1){
									echo("<img src='images/i_hit.gif' align='absmiddle' vspace='1'>");
									}*/
									if($row[icon_new17]==1){
									echo("<img src='images/custom_28.gif' align='absmiddle' vspace='1'><br><br>");
									}
									if($row[icon_sale17]==1){
									echo("<img src='images/custom_27.gif' align='absmiddle' vspace='1'><br><br>");} /*<font color='red'>$row[discount17]%</font>
									*/
									
								echo("</td>

							</tr>");
							if($row[icon_sale17]==1){
							
							echo("<tr><td height='20' align='center'><b><strike>$price1 won</strike></b></td></tr>");
							
							$price=number_format(round($row[price17]*(100-$row[discount17])/100, -1) );
							echo("<tr><td height='20' align='center'><b>$price won</b></td></tr>");
							}
							else
							echo("<tr><td height='20' align='center'><b>$price1 won</b></td></tr>");
						
						echo("</table>

					</td>");
         }
         else
             echo("<td></td>");      // 제품 없는 경우
         $icount++;
     }
    echo("</tr>");
}
echo("</table>");
?>
<?
	$blocks = ceil($pages/$page_block);
	$block = ceil($page/$page_block);
	$page_s = $page_block * ($block-1);
	$page_e = $page_block * $block;
	if($blocks <= $block) $page_e=$pages;

	echo("<table width='929' border='0'> 
	<tr> 
		<td height='20' align='center'>");

	if($block > 1)
	{
		$tmp =$page_s;
		echo("<a href='product.php?page=$tmp&text1=$text1'>
			<img src='images/i_prev.gif' align='absmiddle' border='0'>
		</a>&nbsp");
	}
	for($i=$page_s+1; $i<=$page_e; $i++)
	{
		if($page == $i)
			echo("<font color='red'><b>$i</b></font>&nbsp");
		else
			echo("<a href='product.php?page=$i&text1=$text1'>[$i]</a>&nbsp");
	}
	if ($block < $blocks)
	{
		$tmp = $page_e+1;
		echo("&nbsp<a href='product.php?page=$tmp&text1=$text1'>
			<img src='images/i_next.gif' align='absmiddle' border='0'>
		</a>");
	}
	echo("   </td>
			</tr>
		  </table>");
	?>

				</tr>
			</table>


<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
include "main_bottom.php";
?>