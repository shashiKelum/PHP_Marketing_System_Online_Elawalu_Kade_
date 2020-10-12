<?php
if(isset($_POST['submit'])){
  $form=$_POST['form'];

  $to='sankaamazon@gmail.com';
  $subject='Buy';
  $message="Contact : ".$Contact;
  $headers="From : ".$email;

  if(mail($to, $subject,$message)){
    echo "<h1>Order Successfully! Thank you"." ".$fname.", We will contact you shortly!</h1>";
  }
else {
  echo "Somthin went Wrong!";
}

}
?>
