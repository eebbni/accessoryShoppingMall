<!-------------------------------------------------------------------------------------------->	
<!-- 프로그램 : 쇼핑몰 따라하기 실습지시서 (실습용 HTML)                                    -->
<!--                                                                                        -->
<!-- 만 든 이 : 윤형태 (2008.2 - 2017.12)                                                    -->
<!-------------------------------------------------------------------------------------------->	
<?	
	include "main_top.php";
?>
<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분                                                       -->
<!-------------------------------------------------------------------------------------------->	

			<!--  현재 페이지 자바스크립  -------------------------------------------->
			<script language = "javascript">
			function Login_Check() 
			{
				if (!form2.uid.value) {
					alert("아이디를 입력해 주십시오.");
					form2.uid.focus();
					return;
				}
				if (!form2.pwd.value) {
					alert("비밀번호를 입력해 주십시오.");
					form2.pwd.focus();
					return;
				}
				form2.submit();
			}
			</script>

			<!---- 화면 우측(로그인) S -------------------------------------------------->	
			<table border="0" cellpadding="0" cellspacing="0" width="747" align="center">
				<tr><td height="13"></td></tr>
				<tr>
					<td height="80" align="center" style=padding-right:20px;>
						<img align="absmiddle" src="images/member_login.jpg" width="256" height="46" border="0">
					</td>
				</tr>
				<tr><td height="20"></td></tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="720" align="center">
				<tr>
					<td width="747" align="center" valign="top">
						<table border="0" cellpadding="0" cellspacing="8" width="210" bgcolor="E9E9E9" >
							<tr>
								<td height="210" align="center" bgcolor="white">
									<table border="0" height="120" cellpadding="0" cellspacing="0" width="480" >
										<tr>
											<td width="150" align="center"></td>
											<td width="320">
												<table border="0" cellpadding="0" cellspacing="0" width="320" >
													<tr>
														<td height="25">
															<p style="padding-left:20px;"></p>
														</td>
													</tr>
												</table>
												<table border="0" cellpadding="0" cellspacing="0" width="220">
													<!-- form2 시작 ------>
													<form name = "form2" method = "post" action = "member_check.php">
													<tr>
														<td width="220" height="25">
															<p>
															<!--<img align="absmiddle" src="images/login_id.gif" width="40" height="13" border="0"> -->
															ID<br>
															<input type="text" name="uid" size="20" maxlength="12" class="cmfont1" tabindex="1">
															</p>
														</td>
														
													</tr>
													<tr>
														<td width="220" height="25">
															<p>
															<!--<img align="absmiddle" src="images/login_pw.gif" width="40" height="13" border="0"> --><br>
															PASSWORD<br>
															<input type="password" name="pwd" size="20" maxlength="12" class="cmfont1" tabindex="2"><br><br>
															</p>
														</td>

													</tr>

													<tr>
													<td width="162">
															<br><a href="javascript:Login_Check()" onfocus="this.blur()"><img align="absmiddle" src="images/login_btn.jpg" width="162" height="40" border="0" onmouseout="this.style.opacity=1;this.filters.alpha.opacity=100"  onmouseover="this.style.opacity=0.6;this.filters.alpha.opacity=60"></a>
														</td>
														</tr>
													
													</form>
													<!--form2 끝 ------>
												</table>
											</td>
										</tr>
									</table>
									<table border="0" cellpadding="0" cellspacing="0" width="512">
										<tr><td height="15"></td></tr>
										<tr><td height="2" bgcolor="E9E9E9"></td></tr>
										<tr><td height="15"></td></tr>
									</table>
									<table border="0" cellpadding="0" cellspacing="0" width="511">
										<tr>
											<td align="center">
												<table border="0" cellpadding="0" cellspacing="0">
													<tr>
														<td height="30"></td>
														<td height="30">
															<a href="member_idpw.html" onfocus="this.blur()">Find ID /</a> &nbsp; 
															<a href="member_idpw.html" onfocus="this.blur()">Find PASSWORD</a>
														</td>
													</tr>
												</table>												
											</td>
										</tr>
									</table><br>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분                                                         -->
<!-------------------------------------------------------------------------------------------->	
<?include "main_bottom.php";?>