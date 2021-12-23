<?php



if (insset($_POST['email']!='')){
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $name = $_POST['name'];
        $email= $_POST['email'];
        $phone=$_POST['phone'];
        $message= $_POST['message'];
        $to = "rachaaastid@gmail.com";
        $subject = "Mail From BelevIT";
        $txt ="you have received an e-mail from".$name."\r\n tele = " . $phone . "\r\n Message =" . $message;
        $headers = "From: " .$email ;
       
        if($email!=NULL){
            mail($to,$subject,$txt,$headers);
        }
        //redirect
        header("Location:index.html");
       
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
