<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	

<?
$cookie_no=$_COOKIE[cookie_no];
$cookie_name=$_COOKIE[cookie_name];
$name=$_REQUEST[name];
$menu=$_REQUEST[menu];
$n_cart = $_COOKIE[n_cart];
if (!$n_cart) $n_cart=0;   
?><html>
<head>
<title>예쁜 악세사리들의 모임..EEBBNI</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">


<link rel="shortcut icon" href="images/qw.ico">

<link href="include/font.css" rel="stylesheet" type="text/css">
<script language="Javascript" src="include/common.js"></script>

<style type="text/css">
#aside {position:absolute;  position:fixed;top:2%; left:15%; z-index:3; width:500px;border:0;} 
#aside1 {position:absolute;  position:fixed;top:2%; right:22%; z-index:3; width:500px;border:0;} 
</style>
</style>






<link rel="stylesheet" href="<?=$g4['path']?>/style.css" type="text/css"> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script> 
<script type="text/javascript"> 
 $(function () { 
 var cssTop = parseInt($("#sky").css("top")); 
  $(window).scroll(function () { 
  var position = $(window).scrollTop(); 
  $("#sky").stop().animate({ "top": (position + cssTop) + "px" }, 300); 
  }); 
}); 
</script> 

</head>


<body style="margin:0">
<center>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center" >
	<tr> 
		<td>
			<!--  상단 왼쪽 로고  -------------------------------------------->
			<table border="0" cellspacing="0" cellpadding="0" width="182" >
				<tr>
					<td><a href="index.html"><img src="images/top_logo.gif" width="182" height="30" border="0"></a></td>
				</tr>
			</table>
		</td>
		<td align="right" valign="bottom">
			<!--  상단메뉴 Home/로그인/회원가입/장바구니/주문배송조회/즐겨찾기추가  ---->	
			<div id="aside"><table border="0" cellspacing="0" cellpadding="0" >
				<tr>
					<td><a href="index.html">Home ㅣ</a></td>
					<td></td>
					<?
					if(!$cookie_no)
               {
                  echo("<td ><a href='member_login.php'>&nbsp로그인ㅣ&nbsp</a></td>
                  <td></td>
                  <td ><a href='member_agree.php' >회원가입ㅣ&nbsp</a></td>
                  <td></td>");
               } 
			   else
					echo("<td><a href='member_logout.php'>로그아웃ㅣ&nbsp</a></td>
                  <td></td>
                  <td><a href='member_edit.php'>회원정보수정ㅣ&nbsp</a></td>
                  <td></td>");
			   ?>
					<td><a href="cart.php">장바구니(<?=$n_cart?>)ㅣ&nbsp</a></td>
					<td></td>
					<td><a href="jumun_login.php">주문조회ㅣ&nbsp</a></td>
					<td></td>
					<td><img src="images/top_menu8.png" height=18px onclick="javascript:Add_Site();" style="cursor:hand"></td>
					
				</tr>
				<div id="aside1"><a href="https://www.facebook.com/domaeya#!/domaeya"><img src="images/fb.png" width=44px height=44px></a><a href="https://www.instagram.com/eebbni/" ><img src="images/is.png"></a></div>
			</table>
		</td>
	</tr>
</table></div>
<div id="sky" style="position:absolute; z-index:2;top:200px; left:90%; width:80px; height:50px;  border:1px;"> 
<table width="90"  border="0" cellpadding="2" cellspacing="1" bgcolor="#ffffff">
							<tr><td height="3"  bgcolor="#ffffff"></td></tr>
							<tr><td height="100" bgcolor="#ffffff" align="center" style="font-size:11pt;color:#333333"><b><img src="images/delivery.gif" width="90"></b></td></tr>
							
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="qa.php"><img src="images/main_left_qa.gif" border="0" width="90"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="faq.html"><img src="images/main_left_faq.gif" border="0" width="90"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href=""><img src="images/main_left_etc.gif" border="0" width="90"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td> </td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td> </td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td> </td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="https://maplestory.nexon.com/Home/Main"><img src="images/main_left_etc1.gif" border="0" width="90"></a></td></tr>
									</table>
								</td>
							</tr>
							
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="http://www.domaeya.co.kr/index.html"><img src="images/main_left_etc2.gif" border="0" width="90"></a></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
</div> 
<!--  메인 이미지 --------------------------------------------------->
<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td><a href="index.html"><img src="images/main_image0.gif" width="959" height="175" border="0"></a></td>
	</tr>
</table>

<table width="780" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" bgcolor="#FFFFFF">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>

					<td><a href="product_new.php"><img src="images/main_menu01_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=1"><img src="images/main_menu02_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=2"><img src="images/main_menu03_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=3"><img src="images/main_menu04_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=4"><img src="images/main_menu05_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=5"><img src="images/main_menu06_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=6"><img src="images/main_menu07_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					<td><a href="product.php?menu=7"><img src="images/main_menu08_off.gif" width="96" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td>
					
				</tr>
			</table>
		</td>
	</tr>
</table>


<!-- 상품 검색 ------------------------------------->
<table width="959" height="25" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="30" colspan="5" bgcolor="#ffffff"></td></tr>
	<tr bgcolor="#FFFFFF">
		<td width="181" align="center"><font color="#666666">&nbsp <b>
		<?
		if (!$cookie_no)
			echo("안녕하세요 고객님!");
		else
			echo("안녕하세요 $cookie_name 님!");
		?>
		
		</b></font></td>
		<td style="font-size:9pt;color:#666666;font-family:돋움;padding-left:3px;"></td>
		<td align="right" style="font-size:9pt;color:#666666;font-family:돋움;"><b><img src="images/search.JPG" > &nbsp</b></td>
		<!-- form1 시작 -->
		<form name="form1" method="post" action="product_search.php">
		<td width="135">
			<input type="text" name="findtext" maxlength="40" size="17" class="cmfont1" style="border: solid 0px; background:transparent">
		</td>
		</form>
		<!-- form1 끝 -->
		<td width="65" align="bottom"><a href="javascript:Search()"><img src="images/iconfinder_icon-111-search_314478.png" border="0"></a></td>

              
	</tr>
	<tr><td height="1" colspan="5" bgcolor="#ffffff"></td></tr>
</table>

<table width="959" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr><td height="10" colspan="2"></td></tr>
	<tr>
		<td height="100%" valign="top">
			<!--  화면 좌측메뉴 시작 (main_left)
			<table width="181" border="0" cellspacing="0" cellpadding="0">
				<tr> 
					<td valign="top"> 
						<!--  Category 메뉴 : 세로인 경우 
						<table width="177"  border="0" cellpadding="2" cellspacing="1" bgcolor="#afafaf">
							<tr><td height="3"  bgcolor="#ffffff"></td></tr>
							<tr><td height="30" bgcolor="#f9afc7" align="center"> <img src="images/MENU.gif" width="176" height="30" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></td></tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=1"><img src="images/main_menu01_off.gif" width="176" height="40" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=2"><img src="images/main_menu02_off.gif" width="176" height="40" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=3"><img src="images/main_menu03_off.gif" width="176" height="40" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=4"><img src="images/main_menu04_off.gif" width="176" height="40" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=5"><img src="images/main_menu05_off.gif" width="176" height="40" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=6"><img src="images/main_menu06_off.gif" width="176" height="40" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%"  border="0" cellspacing="0" cellpadding="0">
										<tr><td><a href="product.php?menu=7"><img src="images/main_menu07_off.gif" width="176" height="40" border="0"  onmouseover="img_change('on')" onmouseout="img_change('off')"></a></td></tr>
									</table>
								</td>
							</tr>
							
							
						</table>-------------------------------->
					</td>
				</tr>
				<tr><td height="10"></td></tr>
				<tr> 
					<td> 
						<!--  Custom Service 메뉴(QA, FAQ...) -->
						
			<!--  화면 좌측메뉴 끝 (main_left) --------------------------------->
		</td>
		
		<td valign="top">

