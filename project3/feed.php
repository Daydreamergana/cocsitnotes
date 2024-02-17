<style>
    form input,form textarea{
width: 100%;
border: 0;
outline: none;
background: #262626;
padding: 15px;
margin: 15px 0;
color: #fff;
font-size: 18px;
border-radius: 6px;
}
Form .btn1{
    padding: 14px 40px;
    font-size: 18px;
    margin-top: 0px;
    cursor: pointer;
}
.btn.btn1{
    display: inline-block;
    background: #ff0554;
}
</style>
<?php
$conn=mysqli_connect("localhost","root","","college_notes");
?>

<div class="Form">
    <form method="post" action="">
        <label for="fname">First name:</label><br>
        <input type="text" name="fname" placeholder="First name"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" placeholder="Last name"><br>
        <label for="email">E-mail:</label><br>
        <input type="text" id="email" name="email" placeholder="Your mail Id"><br>
        <label for="text">Feedback:</label><br>
        <textarea name="msg" cols="10" rows="5" placeholder="Your Message"></textarea>
        <button type="submit" class="btn btn1">SUBMIT</button>
    </form>
</div>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];

    $sql="INSERT INTO feedback (first_name, last_name, email, feedback) VALUES ('$fname', '$lname', '$email', '$msg')";
    $result=mysqli_query($conn, $sql);

    if($result){
        echo "success";
    }
    else{
        echo "fail";
    }
}
?>
