<?php

 $messagesent=false;

if (insset($_POST['email']!='')){
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $message=$_POST['message'];
    
        $mailTo="contact@belev-it.com";
    
        $headers="From:".$email;
        $text="you have received an e-mail from".$name."\r\n".$message;
    
        mailparse_stream_encode( $mailTo,$headers, $text);
        rewind($headers);
        header("Location: index.html");
        header("Location: indexar.html");
        header("Location: indexen.html");
        $messagesent=true;
    }
    else{
        $messagesent=false;
    }
   

} 
 //database connection
    $conn=new mysqli('localhost','root','','contact')
    if ($conn->connect_error){
        die('Connection failed :'$conn->connect_error);
    }else{
        $stmt=$conn->prepare("insert into registration(name,email,tele,message) values(?,?,?,?)");
        $stmt->blind_param("ssis",$name,$email,$phone,$text);
        $stmt->execute();
        echo "registration successfully...";
        $stmt->close();
        $conn->close();
    }
?>
