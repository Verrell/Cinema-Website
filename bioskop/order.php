<?php
	session_start();
	include "connect.php";

	$pemutaran = $_GET['pemutaran'];
	$data = $_GET['data'];
	$total = $_GET['total'];
	$res = explode(";", $data);
	$user = $_SESSION['user'];
	$iduser = $_SESSION['iduser'];

	$subject = "Pemesanan Tiket Bioskop";
	$isi = "Terima kasih sudah melakukan pemesanan tiket bioskop. Sebagai bentuk konfirmasi, anda telah memesan sebanyak ".sizeof($res)." kursi bioskop dengan harga masing-masing ".$total." rupiah, sehingga total uang yang harus anda bayar adalah: ".sizeof($res) * $total." rupiah.<br/><br/>
		Pembayaran dapat dilakukan dengan mentransfer ke rekening XXX XXXX XXX a/n Bioskop. Bila anda tidak melakukan pembayaran sebelum tanggal pemutaran film yang tercantum di tiket anda, maka tiket anda menjadi tidak valid dan tidak dapat anda gunakan.<br/><br/>

		Sekian dan terima kasih.";

	$sql = "SELECT email FROM user WHERE id = ".$iduser;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$email = $row['email'];

	require 'PHPMailer-master/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();
								                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'kandangmonyet16@gmail.com';            // SMTP username
	$mail->Password = 'kapokmukapan';                        // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('kandangmonyet16@gmail.com', 'Bioskop');
	$mail->addAddress($email);             // Name is optional
	$mail->addReplyTo('kandangmonyet16@gmail.com', 'Bioskop');
	$mail->isHTML(true);                                  // Set email format to HTML

	//$base_url = "http://ic.petra.ac.id/sysd/confirm.php";

	$mail->Subject = $subject;
	$mail->Body = $isi;

	if(!$mail->send()) {
	    echo "Can't send email... ";
	} else {
		for ($i = 0; $i < sizeof($res); $i++){
			$sql = "INSERT INTO pemesanan VALUES ('', ".$res[$i].", ".$pemutaran.", ".$user.", ".$total.", 0)";
			$result = mysql_query($sql);
		}
		header("Location: success.php?pemutaran=".$pemutaran);
	}
?>