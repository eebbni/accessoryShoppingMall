<?
include "common.php";
include "main_top.php";

$no=$_REQUEST[no];
$query="select * from product where no17=$no";
$result=mysqli_query($db,$query); 
 if (!$result) exit("에러:$query");
 $count=mysqli_num_rows($result);
 $row=mysqli_fetch_array($result);

 $price1=number_format($row[price17]);
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	
<script type="text/javascript">
$(function(){
    $(document).one('click', '.like-review', function(e) {
        $(this).html('<i class="fa fa-heart" aria-hidden="true"></i> You liked this');
        $(this).children('.fa-heart').addClass('animate-like');
    });
});
</script>
<style type="text/css">
.btn {
  display: inline-block;
  background: transparent;
  text-transform: uppercase;
  font-weight: bold;
  font-family:Monaco;
  font-style: normal;
  font-size: 0.9rem;
  letter-spacing: 0.3em;
  color: rgba(248,156,193,0.7);
  border-radius: 0;
  padding: 10px 30px 10px;
  transition: all 0.7s ease-out;
  background: linear-gradient(270deg, rgba(178,178,178,0.8), rgba(178,178,178,0.8), rgba(34,34,34,0), rgba(34,34,34,0));
  background-position: 1% 50%;
  background-size: 300% 300%;
  text-decoration: none;
  margin: 0.625rem;
  border: none;
  border: 1px solid rgba(178,178,178,0.3);
}

.btn:hover {
  color: #fff;
  border: 1px solid rgba(223,190,106,0);
  color: $white;
  background-position: 99% 50%;
}

.like-content {
    display: inline-block;
    width: 100%;
    margin: 40px 0 0;
    padding: 40px 0 0;
    font-size: 18px;
    border-top: 10px dashed #eee;
    text-align: center;
}
.like-content span {
    color: #9d9da4;
    font-family: monospace;
}
.like-content .btn-secondary {
      display: block;
      margin: 40px auto 0px;
    text-align: center;
    background: #ed2553;
    border-radius: 3px;
    box-shadow: 0 10px 20px -8px rgb(240, 75, 113);
    padding: 10px 17px;
    font-size: 18px;
    cursor: pointer;
    border: none;
    outline: none;
    color: #ffffff;
    text-decoration: none;
    -webkit-transition: 0.3s ease;
    transition: 0.3s ease;
}
.like-content .btn-secondary:hover {
      transform: translateY(-3px);
}
.like-content .btn-secondary .fa {
      margin-right: 5px;
}
.animate-like {
    animation-name: likeAnimation;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
    animation-duration: 0.65s;
}
@keyframes likeAnimation {
  0%   { transform: scale(30); }
  100% { transform: scale(1); }
}
/*.sample_image  img {
	-webkit-transform:scale(1);
	-moz-transform:scale(1);
	-ms-transform:scale(1);	
	-o-transform:scale(1);	
	transform:scale(1);
	-webkit-transition:.3s;
	-moz-transition:.3s;
	-ms-transition:.3s;
	-o-transition:.3s;
	transition:.3s;
}
.sample_image:hover img {
	-webkit-transform:scale(1.2);
	-moz-transform:scale(1.2);
	-ms-transform:scale(1.2);	
	-o-transform:scale(1.2);
	transform:scale(1.2);
}
.sample_image { overflow: hidden; } 커지는 소스

사용법
<div class="sample_image">
<img src="images/b_order.gif" border="0" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;
</div>
*/
</style>
			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">
			
			function Zoomimage(no) 
			{
				window.open("zoomimage.php?no="+no, "", "menubar=no, scrollbars=yes, width=560, height=640, top=30, left=50");
			}

			function check_form2(str) 
			{
				if (!form2.opts1.value) {
						alert("옵션1을 선택하십시요.");
						form2.opts1.focus();
						return;
				}
				if (!form2.opts2.value) {
						alert("옵션2를 선택하십시요.");
						form2.opts2.focus();
						return;
				}
				if (!form2.num.value) {
						alert("수량을 입력하십시요.");
						form2.num.focus();
						return;
				}
				if (str == "D") {
					form2.action = "cart_edit.php";
					form2.kind .value = "order";
					form2.submit();
				}
				else {
					form2.action = "cart_edit.php";
					form2.submit();
				}
			}

			</script>

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="90"><img src="images/product_title3.gif" width="510" height="50" border="0" align="left"style="padding-left:130px"></td>
				</tr>
				<tr><td height="1"></td></tr>
			</table>

			<!-- form2 시작  -->
			<form name="form2" method="post" action="">
			<input type="hidden" name="no" value="<?=$no?>">
			<input type="hidden" name="kind" value="insert">

			<table border="0" cellpadding="0" cellspacing="0" width="745"  align="center">
				<tr>
					<td width="335" align="center" valign="top">
						<!-- 상품이미지 -->
						<table border="0" cellpadding="0" cellspacing="1" width="315" height="315" bgcolor="FFFFFF">
							<tr>
								<td bgcolor="white" align="center">
									<img src="product/<?=$row[image117]?>" height="315" border="0" align="absmiddle" ONCLICK="Zoomimage('<?=$no?>')" STYLE="cursor:hand">
								</td>

							</tr>
									<td height="50" align="center">
									<img src="images/product_text1.gif" border="0" align="absmiddle">
								</td>
						</table>
					</td>
					<td width="410 " align="center" valign="top">
						<!-- 상품명 -->
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<tr>
								<td width="80" height="45" style="padding-left:10px">
									
									<font color="666666"><b>제품명</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<font color="282828"><?=$row[name17]?></font><br>
									<?
									if($row[icon_new17]==1){
									echo("<img src='images/custom_28.gif' align='absmiddle' vspace='1'>");
									}
									if($row[icon_sale17]==1){
									echo("<img src='images/custom_27.gif' align='absmiddle' vspace='1'> ");
									}?>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 시중가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									
									<font color="666666"><b>소비자가</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td width="289" style="padding-left:10px"><font color="666666"><?=$price1?>won</font></td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 판매가 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									
									<font color="666666"><b>판매가</b></font>
								</td>
								<?
								
								if($row[icon_sale17]==1){
								$price=number_format(round($row[price17]*(100-$row[discount17])/100, -1) );
								echo("<td width='1' bgcolor='E8E7EA'></td>
								<td style='padding-left:10px'><font color='999999'><b><strike>$price1 won</strike></font> <font color='666666'>-></font> <font color='FF6666'>♥ $price won ♥</b></font></td>
							</tr>");}
								else{
									echo("<td width='1' bgcolor='E8E7EA'></td>
								<td style='padding-left:10px'><font color='0288DD'><b>$price1 won</b></font></td>
							</tr>");
								
								}
								?>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 옵션 -->
							

								<?

								echo("<tr>
								<td width='80' height='35' style='padding-left:10px'>
									
									<font color='666666'><b>옵션선택</b></font>
								</td>
								<td width='1' bgcolor='E8E7EA'></td>
								<td style='padding-left:10px'>");
								
								$query="select * from opts where opt_no17=$row[opt117] order by name17"; //새로운 query 문 불러오기
								$result=mysqli_query($db,$query); 
								if (!$result) exit("에러:$query");
								$count=mysqli_num_rows($result); 

							echo("<select name='opts1' class='cmfont1'>");
								for($i=0;$i<=$count;$i++)
								{
								if ($opts1==$i){
										echo("<option value='0' selected>선택하세요</option>");}
								else{
									$row1=mysqli_fetch_array($result);
									echo("<option value='$row1[no17]'>$row1[name17]</option>");}
								}
								echo("</select>");?>
								&nbsp;
								
							<?
								$query="select * from opts where opt_no17=$row[opt217] order by name17"; 
								$result=mysqli_query($db,$query); //row 처음부터 출력하기
								if (!$result) exit("에러:$query");
								$count=mysqli_num_rows($result);

								echo("<select name='opts2' class='cmfont1'>");
								for($i=0;$i<=$count;$i++)
								{
								if ($opts1==$i){
										echo("<option value='0' selected>선택하세요</option>");}
								else{
									$row1=mysqli_fetch_array($result);
									echo("<option value='$row1[no17]'>$row1[name17]</option>");}
								}
								echo("</select>");
								?>

								<!--
								옵션선택 없을경우에 어떻게 하는가
								else{
								echo("<tr>
								<td width='80' height='35' style='padding-left:10px'>
									<img src='images/i_dot1.gif' width='3' height='3' border='0' align='absmiddle'>
									<font color='666666'><b>옵션선택</b></font>
								</td>
								<td width='1' bgcolor='E8E7EA'></td>
								<td style='padding-left:10px'>");
								
								echo("<select name='opts1' class='cmfont1'>");
										echo("<option value='0' selected>$row[name17]</option>");
								
								echo("</select>");
								}-->
									
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
							<!-- 수량 -->
							<tr>
								<td width="80" height="35" style="padding-left:10px">
									<!--<img src="images/i_dot1.gif" width="3" height="3" border="0" align="absmiddle">-->
									<font color="666666"><b>수량</b></font>
								</td>
								<td width="1" bgcolor="E8E7EA"></td>
								<td style="padding-left:10px">
									<input type="text" name="num" value="1" size="3" maxlength="5" class="cmfont1"> <font color="666666">개</font>
								</td>
							</tr>
							<tr><td colspan="3" bgcolor="E8E7EA"></td></tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								<td height="150" align="center">
									
									
<!--<img src="images/b_order.gif" style="opacity:1;filter:alpha(opacity=100)" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"  onmouseover="this.style.opacity=0.6;this.filters.alpha.opacity=60" border="0" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;-->

					
									<a class="btn" href="javascript:check_form2('D')"><span style="color:black">BUY IT NOW</span></a>
									<a class="btn" href="javascript:check_form2('C')"><span style="color:black">ADD TO CART</span></a>
									
<!--<img src="images/b_cart.gif"  style="opacity:1;filter:alpha(opacity=100)" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"  onmouseover="this.style.opacity=0.6;this.filters.alpha.opacity=60" border="0" align="absmiddle"></a>&nbsp;&nbsp;&nbsp;-->

								</td>
							</tr>
						</table>
						<table border="0" cellpadding="0" cellspacing="0" width="370" class="cmfont">
							<tr>
								
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</form>
			<!-- form2 끝  -->

			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="22"></td></tr>
			</table>

			<!-- 상세설명 -->
			<table border="0" cellpadding="0" cellspacing="0" width="747">
				<tr><td height="13"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td height="30" align="center">
						<img src="images/product_title.gif" width="746" height="60" border="0">
						<img src="images/line.gif">
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746" style="font-size:9pt">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="200" align="center" valign=top style="line-height:14pt">
						
						<br>
						<br>
						<center>
<div class="like-content">
  
  <span>
    Did you like this product? Press like to make it easier for others to see
  </span>
  
  <button class="btn-secondary like-review">
    <i class="fa fa-heart" aria-hidden="true"></i> Like
  </button>
  
</div>
<br><br><br>
						<img src="product/<?=$row[image317]?>" width=1000 ><br><br><br>
						
						</center>
					</td>
				</tr>
			</table>

			<!-- 교환배송정보 -->
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746">
				<tr>
					<td align="center" class="cmfont"></td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="746" class="cmfont">
				<tr><td height="10"></td></tr>
			</table>


<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?
include "main_bottom.php";
?>