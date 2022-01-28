<?php
    $convert = 0;
    if(isset($_POST['Submit']) & isset($_POST['email']) & !empty($_POST['email'])){
    $url = "http://authenticate.urlprofiler.com/license/register";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
       "Content-Type: application/json",
       "Host: authenticate.urlprofiler.com",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $randomint = random_int(1, 999999999999999999);
    $data = '{"SerialNumber":null,"MachineName":"CRACKED","Version":"CRACKED","FirstName":"CRACKED","LastName":"CRACKED","Windows":true,"EmailAddress":"'. $_POST['email'] .'","MachineId":"'. $randomint .'","Profile":false,"Feedback":null,"Optin":true}';
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
    $resp = curl_exec($curl);
    curl_close($curl);
    $decode = json_decode($resp);
    $convert = '<h3 style="font-family: Lucida Console;">'. $decode->{'Title'} .'</h3>';
    $convert2 = '<h4 style="font-family: Lucida Console;">'. $decode->{'Message'} .'</h4>';
}
?>
<form action="" method="post">
<input type="email" placeholder="your@email.com" name="email" class="form-control">
<button style="cursor:pointer" type="submit" name="Submit" enabled>Generate Serial Key</button>
</form>

<?php 
    if($sent = "1" & $convert != "0"){
        echo $convert;
        echo $convert2;
    }
?>