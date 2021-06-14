<?
include "common.php";
include "main_top.php";

$cart = $_COOKIE[cart];
//$a=$_COOKIE[a] 라고 쓰면 $a[0]이나 $a[1] 값을 사용할 수 있다.
$n_cart = $_COOKIE[n_cart];

?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">

			function cart_edit(kind,pos) {
				if (kind=="deleteall") 
				{
					location.href = "cart_edit.php?kind=deleteall";
				} 
				else if (kind=="delete")	{
					location.href = "cart_edit.php?kind=delete&pos="+pos;
				} 
				else if (kind=="insert")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=insert&pos="+pos+"&num="+num;
				}
				else if (kind=="update")	{
					var num=eval("form2.num"+pos).value;
					location.href = "cart_edit.php?kind=update&pos="+pos+"&num="+num;
				}
			}

			</script>

			<!-- form2 시작  -->
			<table border="0" cellpadding="0" cellspacing="0" width="747" align="center">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746" align="center">
				<tr>
					<td height="30" align="left"><td height="50" align="center" style=padding-right:20px;>
						<h2>Shopping Cart</h2>
					</td></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="747" align="center">
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710" class="cmfont" align="center">
				<tr>
					<hr align="center" style="width: 80%;">
					<table border="0" cellpadding="5" cellspacing="1" width="750" class="cmfont" bgcolor="ffffff" align="center">
				<tr bgcolor="Ffffff" height="3" class="cmfont">
				
					<td width="280" align="center">상품</td>
					<td width="100"  align="center">수량</td>
					<td width="80"  align="center">가격</td>
					<td width="90"  align="center">합계</td>
					<td width="50"  align="center">삭제</td>

				</tr>


				<form name="form2" method="post">
				<tr>
					
					<?
                     $total=0;
                     if (!$n_cart) $n_cart=0;
if ($n_cart==0)
						echo("<tr>
						   <td height='20' align='center' bgcolor='#FFFFFF'>

							<tr>
								<td width='400' style=padding-left:300px;>
						   <b>장바구니에 담긴 상품이 없습니다.</b>
                        </td>
                       
                     </tr>
                  
               </td></tr>");
				
					 
				
                     for ($i=1;  $i<=$n_cart;  $i++)
                     {
                      if ($cart[$i])
                     {
                        list($no, $num, $opts1, $opts2)=explode("^", $cart[$i]);
                        //제품($no), 옵션 ($opts1, $opts2) 정보 알아내기
                        $query="select * from product where no17=$no";
                        $result=mysqli_query($db,$query); 
                         if (!$result) exit("에러:$query");
                         $row=mysqli_fetch_array($result);
                        $price=number_format($row[price17]);
						
                           echo("
						   <td height='60' align='center' bgcolor='#FFFFFF'>

						<table cellpadding='0' cellspacing='0' width='100%'>

							<tr>
								<td width='60'>
						   <a href='product_detail.php?no=$row[no17]'><img src='product/$row[image117]' width='50' height='50' border='0'></a>
                        </td>
                        <td class='cmfont'>
                           <a href='product_detail.php?no=$row[no17]'>$row[name17]</a><br>");

                        $query="select * from opts where no17=$opts1"; //새로운 query 문 불러오기
                        $result=mysqli_query($db,$query); 
                        if (!$result) exit("에러:$query");
                        $row1=mysqli_fetch_array($result);

                        $query="select * from opts where no17=$opts2"; //새로운 query 문 불러오기
                        $result=mysqli_query($db,$query); 
                        if (!$result) exit("에러:$query");
                        $row2=mysqli_fetch_array($result);

                           echo("<font color='#0066CC'>[옵션사항]</font> $row1[name17] / $row2[name17]
                        </td>
                     </tr>
                  </table>
               </td>");


               echo("<td align='center' bgcolor='#FFFFFF'>
                  <input type='text' name='num$i' size='3' value='$num' class='cmfont1'>&nbsp<font color='#464646'>개</font>
               </td>");

				$price=number_format($row[price17]);
				$price2=number_format(round($row[price17]*(100-$row[discount17])/100, -1) );

				if($row[icon_sale17]==1){
                  $price=number_format(round($row[price17]*(100-$row[discount17])*$num/100, -1) );
               }
			   else
				  $price1=number_format($row[price17]*$num );

               if($row[icon_sale17]==1){
				echo("<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price2");
			   }
			   else{
				   echo("<td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price");
			   }


			   if($row[icon_sale17]==1){
                  echo("</font></td>
               <td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price</font></td>");
               }
			   else
				  echo("</font></td>
               <td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price1</font></td>");

			   
               echo("<td align='center' bgcolor='#FFFFFF'>"); ?>

                  <a href = "javascript:cart_edit('update','<?=$i?>')"><img src="images/b_edit1.gif" border="0"></a>&nbsp<br>
                  <a href = "javascript:cart_edit('delete','<?=$i?>')"><img src="images/b_delete1.gif" border="0"></a>&nbsp
				   
			   <?
				   echo("</td>
				</tr>");

               if($row[icon_sale17]==1){
                  $price_sale=$row[price17]*(100-$row[discount17])*$num/100;
				  $total=$total+$price_sale;
               }
			   else{
				  $price_nosale=$row[price17]*$num;
			      $total=$total+$price_nosale;
			   }

								}
							}
				if ($total < $max_baesongbi) $total1=$total + $baesongbi ;
				else{
					$baesongbi=0;
					$total1=$total ;}

				$price_baesongbi=number_format($baesongbi);
				$price_total=number_format($total);
				$price_total1=number_format($total1);

					?>

				
				<tr>
				
					<td colspan="5" bgcolor="#ffffff">
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr><hr align="center" style="width:770px;">
								<td bgcolor="#Ffffff"></td>
								<td align="right" bgcolor="#Ffffff">
									<font color="#0066CC"><b>총 합계금액</font></b> : 상품대금(<?=$price_total?>원) + 배송료(<?=$price_baesongbi?>원) = <font color="#FF3333"><b><?=$price_total1?>원</b></font>&nbsp;&nbsp
<hr align="center" style="width:770px;">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			</table>

			
			<!-- form2 끝  -->
			<br>
			<br>
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="center">
				<tr height="44">
					<td width="710" align="center" valign="middle">
						<a href="index.html"><img src="images/b_shopping.gif" border="0"></a>&nbsp;&nbsp;
						<a href="javascript:cart_edit('deleteall')"><img src="images/b_cartalldel.gif" width="103" height="26" border="0"></a>&nbsp;&nbsp;
						<a href="order.php"><img src="images/b_order1.gif" border="0"></a>
					</td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

<?
include "main_bottom.php";
?>