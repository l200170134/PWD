<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
    mysql_connect('localhost','root','');
    mysql_select_db('informatika');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if($submit){
        $sql = "SELECT * FROM user WHERE Username = '$username' and Password = '$password' ";
        $query  = mysql_query($sql);
        $row = mysql_fetch_array($query);

        if($row['Username']!=""){
            // berhasil login
            $_SESSION['username'] = $row['Username'];
            $_SESSION['status'] = $row['status'];
            ?>
            <script language script="Javascript">
                alert('Anda login sebagai <?php echo $row['Username']; ?>')
                document.location = 'hasillogin.php';
            </script>

        <?php
        }else{
            // gagal login
            ?>
            <script language script="Javascript">
                alert('Gagal LOGIN boss..')
                document.location = 'login.php';
            </script>
        <?php
        }
    }
    ?>  

<form action="login.php" method="POST">
    <p align='center'>
        Username = <input type="text" name="username"><br>
        Password = <input type="text" name="password"><br>
        <input type="submit" name="submit">
    </p>
</form>