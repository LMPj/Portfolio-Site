<?php
/* Email form with gmail 
 * By LMPJ - LAURO MANOEL PIRES JUNIOR (lauroindcontato@gmail.com)
 * License MIT
 * This and other projects you can see at : https://bit.ly/2C4WixZ 
 */


 $GetPost = filter_input_array(INPUT_POST,FILTER_DEFAULT);

 //$Erro = true;
 $nome = $GetPost['name'];
 $message = $GetPost['message'];
 $email = $GetPost['mail'];
 
include "phpmailer/PHPMailerAutoload.php";

$Mailer = new PHPMailer;
$Mailer->SMTPDebug = 3;
$Mailer->IsSMTP();
$Mailer->Host="smtp.gmail.com";
$Mailer->SMTPAuth = true;
$Mailer->Username = "contactsiteemail@gmail.com";
$Mailer->Password = "yourpassword123";
$Mailer->SMTPSecure = "tls";
$Mailer->Port = 587;
$Mailer->FromName = ($nome);
$Mailer->From = "contactsiteemail@gmail.com";
$Mailer->AddAddress("lauroindcontato@gmail.com");
$Mailer->IsHTML(true);
$Mailer->Subject = "Contact Form - $nome";
$Mailer->Body = "Name: ".$nome."\n"."Email: ".$email."\n"."Message: ".$message."\n";

if($Mailer->Send()){
    header("location:contato.html?mensagem=enviada");
    //$erro = false;

}
//var_dump($Erro);



?>