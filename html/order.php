<?
include "common.php";
include "main_top.php";

$cart = $_COOKIE[cart];
//$a=$_COOKIE[a] 라고 쓰면 $a[0]이나 $a[1] 값을 사용할 수 있다.
$n_cart = $_COOKIE[n_cart];
$num=$_REQUEST[num];

$o_no="0";
					$o_name="";
					$o_zip="";
					$o_juso="";
					$o_tel="";
					$o_phone="";
					$o_email="";

?>

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language="javascript">

			function Check_Value() {
				if (!form2.o_name.value) {
					alert("주문자 이름이 잘 못 되었습니다.");	form2.o_name.focus();	return;
				}
				if (!form2.o_tel1.value || !form2.o_tel2.value || !form2.o_tel3.value) {
					alert("전화번호가 잘 못 되었습니다.");	form2.o_tel1.focus();	return;
				}
				if (!form2.o_phone1.value || !form2.o_phone2.value || !form2.o_phone3.value) {
					alert("핸드폰이 잘 못 되었습니다.");	form2.o_phone1.focus();	return;
				}
				if (!form2.o_email.value) {
					alert("이메일이 잘 못 되었습니다.");	form2.o_email.focus();	return;
				}
				if (!form2.o_zip.value) {
					alert("우편번호가 잘 못 되었습니다.");	form2.o_zip.focus();	return;
				}
				if (!form2.o_juso.value) {
					alert("주소가 잘 못 되었습니다.");	form2.o_juso.focus();	return;
				}

				if (!form2.r_name.value) {
					alert("받으실 분의 이름이 잘 못 되었습니다.");	form2.r_name.focus();	return;
				}
				if (!form2.r_tel1.value || !form2.r_tel2.value || !form2.r_tel3.value) {
					alert("전화번호가 잘 못 되었습니다.");	form2.r_tel1.focus();	return;
				}
				if (!form2.r_phone1.value || !form2.r_phone2.value || !form2.r_phone3.value) {
					alert("핸드폰이 잘 못 되었습니다.");	form2.r_phone1.focus();	return;
				}
				if (!form2.r_email.value) {
					alert("이메일이 잘 못 되었습니다.");	form2.r_email.focus();	return;
				}
				if (!form2.r_zip.value) {
					alert("우편번호가 잘 못 되었습니다.");	form2.r_zip.focus();	return;
				}
				if (!form2.r_juso.value) {
					alert("주소가 잘 못 되었습니다.");	form2.r_juso.focus();	return;
				}

				form2.submit();
			}

			function FindZip(zip_kind) 
			{
				window.open("zipcode.php?zip_kind="+zip_kind, "", "scrollbars=no,width=500,height=250");
			}

			function SameCopy(str) {
				if (str == "Y") {
					form2.r_name.value = form2.o_name.value;
					form2.r_zip.value = form2.o_zip.value;
					form2.r_juso.value = form2.o_juso.value;
					form2.r_tel1.value = form2.o_tel1.value;
					form2.r_tel2.value = form2.o_tel2.value;
					form2.r_tel3.value = form2.o_tel3.value;
					form2.r_phone1.value = form2.o_phone1.value;
					form2.r_phone2.value = form2.o_phone2.value;
					form2.r_phone3.value = form2.o_phone3.value;
					form2.r_email.value = form2.o_email.value;
				}
				else {
					form2.r_name.value = "";
					form2.r_zip.value = "";
					form2.r_juso.value = "";
					form2.r_tel1.value = "";
					form2.r_tel2.value = "";
					form2.r_tel3.value = "";
					form2.r_phone1.value = "";
					form2.r_phone2.value = "";
					form2.r_phone3.value = "";
					form2.r_email.value = "";
				}
			}

			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747" align="center">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="30" align="center"><img src="images/jumun_title.gif" width="746" height="30" border="0"></td>
				</tr>
				<tr><td height="13"></td></tr>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="710" align="center">
				<tr>
					<td><img src="images/order_title1.gif" width="65" height="15" border="0"></td>
				</tr>
				<tr><td height="10"></td></tr>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="710" class="cmfont" bgcolor="#CCCCCC" align="center">
				<tr bgcolor="F0F0F0" height="23" class="cmfont" >
					<td width="440" align="center">상품</td>
					<td width="70"  align="center">수량</td>
					<td width="100" align="center">가격</td>
					<td width="100" align="center">합계</td>
				</tr>
				<tr bgcolor="#FFFFFF">
				<?
                     $total=0;
                     if (!$n_cart) $n_cart=0;
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

					echo("<td height='60' align='center' bgcolor='#FFFFFF'>
						<table cellpadding='0' cellspacing='0' width='100%'>
							<tr>
								<td width='60'>
						   <a href='product_detail.php?no=$row[no17]'><img src='product/$row[image117]' width='50' height='50' border='0'></a>
                        </td>
                        <td class='cmfont'>
                           <a href='product_detail.php?no=$row[no17]'><font color='#0066CC'>$row[name17]</font></a><br>");

				$query="select * from opts where no17=$opts1"; //새로운 query 문 불러오기
                $result=mysqli_query($db,$query); 
                if (!$result) exit("에러:$query");
                $row1=mysqli_fetch_array($result);

                $query="select * from opts where no17=$opts2"; //새로운 query 문 불러오기
                $result=mysqli_query($db,$query); 
                if (!$result) exit("에러:$query");
                $row2=mysqli_fetch_array($result);

				echo("[옵션]</font> $row1[name17] / $row2[name17]
                        </td>
                     </tr>
                  </table>
               </td>");?>

				<td align="center" bgcolor='#FFFFFF'><font color="#464646"><?=$num?>개</font></td>
			   <? $price=number_format($row[price17]);
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
               <td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price</font>원</td>");
               }
			   else{
				  echo("</font></td>
               <td align='center' bgcolor='#FFFFFF'><font color='#464646'>$price1</font>원</td>");}
?>	
<?
				echo("
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
				</tr>
				
				<tr>
					<td colspan="5" bgcolor="#F0F0F0">
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr>
								<td bgcolor="#F0F0F0"><img src="images/cart_image1.gif" border="0"></td>
								<td align="right" bgcolor="#F0F0F0">
								<font color="#0066CC"><b>총 합계금액</font></b> : 상품대금(<?=$price_total?>원) + 배송료(<?=$price_baesongbi?>원) = <font color="#FF3333"><b><?=$price_total1?>원</b></font>&nbsp;&nbsp
									
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br><br>

			<!-- 주문자 정보 -->
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="center">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
			</table>

			<!-- form2 시작  -->
			<form name="form2" method="post" action="order_pay.php">
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="center">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5">
						<font size="2" color="#B90319"><b>주문자 정보</b></font>
					</td>
					<td align="center" width="560">

<?
if ($cookie_no)     // 쿠키로 로그인했는지 조사
{
	$query="select * from member where no17=$cookie_no;";
    $result=mysqli_query($db,$query); 
    if (!$result) exit("에러:$query");
    $row=mysqli_fetch_array($result);
   
   echo("<table width='560' border='0' cellpadding='0' cellspacing='0' class='cmfont' align='center'>
							<tr height='25'>
								<td width='150'><b>주문자 성명</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>
									<input type='hidden' name='o_no' value='$row[no17]'>
									<input type='text'   name='o_name' size='20' maxlength='10' value='$row[name17]' class='cmfont1'>
								</td>
							</tr>
							<tr height='25'>
								<td width='150'><b>전화번호</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>");
	$o_tel1=trim(substr($row[tel17],0,3));        
    $o_tel2=trim(substr($row[tel17],3,4));     
    $o_tel3=trim(substr($row[tel17],7,4));
									echo("<input type='text' name='o_tel1' size='4' maxlength='4' value='$o_tel1' class='cmfont1'> -
									<input type='text' name='o_tel2' size='4' maxlength='4' value='$o_tel2' class='cmfont1'> -
									<input type='text' name='o_tel3' size='4' maxlength='4' value='$o_tel3' class='cmfont1'>
								</td>
							</tr>
							<tr height='25'>");
	$o_phone1=trim(substr($row[tel17],0,3));        
    $o_phone2=trim(substr($row[tel17],3,4));     
    $o_phone3=trim(substr($row[tel17],7,4));
								echo("<td width='150'><b>휴대폰번호</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>
									<input type='text' name='o_phone1' size='4' maxlength='4' value='$o_phone1' class='cmfont1'> -
									<input type='text' name='o_phone2' size='4' maxlength='4' value='$o_phone2' class='cmfont1'> -
									<input type='text' name='o_phone3' size='4' maxlength='4' value='$o_phone3' class='cmfont1'>
								</td>
							</tr>
							<tr height='25'>
								<td width='150'><b>E-Mail</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>
									<input type='text' name='o_email' size='50' maxlength='50' value='$row[email17]' class='cmfont1'>
								</td>
							</tr>
							<tr height='50'>
								<td width='150'><b>주소</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>
									<input type='text' name='o_zip' size='5' maxlength='5' value='$row[zip17]' class='cmfont1'> 
									<a href='javascript:FindZip(1)'><img src='images/b_zip.gif' align='absmiddle' border='0'></a> <br>
									<input type='text' name='o_juso' size='55' maxlength='200' value='$row[juso17]' class='cmfont1'><br>
								</td>
							</tr>
						</table>");
   
}

else{
	echo("<table width='560' border='0' cellpadding='0' cellspacing='0' class='cmfont' align='center'>
							<tr height='25'>
								<td width='150'><b>주문자 성명</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>
									<input type='hidden' name='o_no' value='0'>
									<input type='text'   name='o_name' size='20' maxlength='10' value='' class='cmfont1'>
								</td>
							</tr>
							<tr height='25'>
								<td width='150'><b>전화번호</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>
									<input type='text' name='o_tel1' size='4' maxlength='4' value='' class='cmfont1'> -
									<input type='text' name='o_tel2' size='4' maxlength='4' value='' class='cmfont1'> -
									<input type='text' name='o_tel3' size='4' maxlength='4' value='' class='cmfont1'>
								</td>
							</tr>
							<tr height='25'>
								<td width='150'><b>휴대폰번호</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>
									<input type='text' name='o_phone1' size='4' maxlength='4' value='' class='cmfont1'> -
									<input type='text' name='o_phone2' size='4' maxlength='4' value='' class='cmfont1'> -
									<input type='text' name='o_phone3' size='4' maxlength='4' value='' class='cmfont1'>
								</td>
							</tr>
							<tr height='25'>
								<td width='150'><b>E-Mail</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>
									<input type='text' name='o_email' size='50' maxlength='50' value='' class='cmfont1'>
								</td>
							</tr>
							<tr height='50'>
								<td width='150'><b>주소</b></td>
								<td width='20'><b>:</b></td>
								<td width='390'>
									<input type='text' name='o_zip' size='5' maxlength='5' value='' class='cmfont1'> 
									<a href='javascript:FindZip(1)'><img src='images/b_zip.gif' align='absmiddle' border='0'></a> <br>
									<input type='text' name='o_juso' size='55' maxlength='200' value='' class='cmfont1'><br>
								</td>
							</tr>
						</table>");
}
?>

						

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<!-- 배송지 정보 -->
			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="center">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="center">
				<tr>
					<td align="left" valign="top" width="150" STYLE="padding-left:45;padding-top:5"><font size=2 color="#B90319"><b>배송지 정보</b></font></td>
					<td align="center" width="560">

						<table width="560" border="0" cellpadding="0" cellspacing="0" class="cmfont">
							<tr height="25">
								<td width="150"><b>주문자정보와 동일</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="radio" name="same" onclick="SameCopy('Y')">예 &nbsp;
									<input type="radio" name="same" onclick="SameCopy('N')">아니오
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>받으실 분 성명</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_name" size="20" maxlength="10" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>전화번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_tel1" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_tel2" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_tel3" size="4" maxlength="4" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>휴대폰번호</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_phone1" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_phone2" size="4" maxlength="4" value="" class="cmfont1"> -
									<input type="text" name="r_phone3" size="4" maxlength="4" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="25">
								<td width="150"><b>E-Mail</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_email" size="50" maxlength="50" value="" class="cmfont1">
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b>주소</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<input type="text" name="r_zip" size="5" maxlength="5" value="" class="cmfont1"> 
									<a href="javascript:FindZip(2)"><img src="images/b_zip.gif" align="absmiddle" border="0"></a> <br>
									<input type="text" name="r_juso" size="55" maxlength="200" value="" class="cmfont1"><br>
								</td>
							</tr>
							<tr height="50">
								<td width="150"><b>배송시요구사항</b></td>
								<td width="20"><b>:</b></td>
								<td width="390">
									<textarea name="memo" cols="60" rows="3" class="cmfont1"></textarea>
								</td>
							</tr>
						</table>

					</td>
				</tr>
				<tr height="10"><td></td></tr>
			</table>

			<table width="710" border="0" cellpadding="0" cellspacing="0" class="cmfont" align="center">
				<tr height="3" bgcolor="#CCCCCC"><td></td></tr>
				<tr height="10"><td></td></tr>
			</table>

			</form>

			<table width="950" border="0" cellpadding="0" cellspacing="0" class="cmfont">
				<tr>
					<td align="center">
						<img src="images/b_order4.gif" onclick="Check_Value()" style="cursor:hand" align="center">

						

					</td>
				</tr>
				<tr height="20"><td></td></tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	

	<?
	include "main_bottom.php";
	?>