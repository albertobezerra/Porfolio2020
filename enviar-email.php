<?php
    // Criando nossas vari�veis para guardar as informa��es do formul�rio
    $nome=$_POST['nome'];
    $assunto=$_POST['assunto'];
    $email=$_POST['email'];
    $date=date("d/m/Y");
    $msg=$_POST['mensagem'];
    // formatando nossa mensagem (que ser� envaida ao e-mail)
    $mensagem= 'Esta mensagem foi enviada atraves do formulario do seu site:<br><br>';
    $mensagem.='<b>Nome: </b>'.$nome.'<br>';
    $mensagem.='<b>Assunto:</b> '.$assunto.'<br>';
    $mensagem.='<b>E-Mail:</b> '.$email.'<br>';
    $mensagem.='<b>Data de envio:</b> '.$date.'<br>';
    $mensagem.='<b>Mensagem:</b><br> '.$msg;
    // abaixo as requisi��es do arquivo phpmailer
    require("phpmailer/src/PHPMailer.php");
    require("phpmailer/src/SMTP.php");
    require ("phpmailer/src/Exception.php");
 
    // chamando a fun��o do phpmailer
 
$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP(); // N�o modifique
    $mail->Host       = 'imap.umbler.com';  // SEU HOST (HOSPEDAGEM)
    $mail->SMTPAuth   = true;                        // Manter em true
    $mail->Username   = 'contato@equipebezerradasilva.com.br';   //SEU USU�RIO DE EMAIL
    $mail->Password   = '2532547890Am@';                   //SUA SENHA DO EMAIL SMTP password
    $mail->SMTPSecure = 'ssl';    //TLS OU SSL-VERIFICAR COM A HOSPEDAGEM
    $mail->Port       = 993;     //TCP PORT, VERIFICAR COM A HOSPEDAGEM
    $mail->CharSet = 'UTF-8';    //DEFINE O CHARSET UTILIZADO
    
    //Recipients
    $mail->setFrom('contato@equipebezerradasilva.com.br');  //DEVE SER O MESMO EMAIL DO USERNAME
    $mail->addAddress('contato@equipebezerradasilva.com.br');     // QUAL EMAIL RECEBER� A MENSAGEM!
    $mail->addAddress('albertofbezerra@gmail.com');     // QUAL EMAIL RECEBER� A MENSAGEM!
 
    // $mail->addAddress('ellen@example.com');    // VOC� pode incluir quantos receptores quiser
    $mail->addReplyTo($email, $nome);  //AQUI SERA O EMAIL PARA O QUAL SERA RESPONDIDO                  
    // $mail->addCC('cc@example.com'); //ADICIONANDO CC
    // $mail->addBCC('bcc@example.com'); //ADICIONANDO BCC
 
    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensagem do Formulario'; //ASSUNTO
    $mail->Body    = $mensagem;  //CORPO DA MENSAGEM
    $mail->AltBody = $mensagem;  //CORPO DA MENSAGEM EM FORMA ALT
 
    // $mail->send();
    if(!$mail->Send()) {
        echo "<script>alert('Erro ao enviar o E-Mail');window.location.assign('https://equipebezerradasilva.com.br/alberto/index.html');</script>";
     }else{
        echo "<script>alert('E-Mail enviado com sucesso!');window.location.assign('https://equipebezerradasilva.com.br/alberto/index.html');</script>";
     }
     die
?>