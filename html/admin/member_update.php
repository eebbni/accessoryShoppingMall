<?	 
	 include "../common.php";
	 $no=$_REQUEST[no];
	 $name=$_REQUEST[name];
	 $tel1=$_REQUEST[tel1];
	 $tel2=$_REQUEST[tel2];
	 $tel3=$_REQUEST[tel3];
	 $phone1=$_REQUEST[phone1];
	 $phone2=$_REQUEST[phone2];
	 $phone3=$_REQUEST[phone3];
	 $sm=$_REQUEST[sm];
	 $email=$_REQUEST[email];
	 $zip=$_REQUEST[zip];
	 $birthday1=$_REQUEST[birthday1];
	 $birthday2=$_REQUEST[birthday2];
	 $birthday3=$_REQUEST[birthday3];
	 $juso=$_REQUEST[juso];
	 $gubun=$_REQUEST[gubun];
	 $pwd=$_REQUEST[pwd];

	 $tel = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);  
	 $phone = sprintf("%-3s%-4s%-4s", $phone1, $phone2, $phone3);  
	 $birthday = sprintf("%04d-%02d-%02d", $birthday1, $birthday2, $birthday3);

	 $query="update member set pwd17='$pwd',name17='$name', birthday17='$birthday', sm17='$sm', tel17='$tel', phone17='$phone',zip17='$zip', juso17='$juso', email17='$email',gubun17='$gubun' where no17=$no;";
	 $result=mysqli_query($db,$query);
	 if (!$result) exit("에러:$query"); 

	 echo("<script>location.href='member.php'</script>");
	
	 ?>