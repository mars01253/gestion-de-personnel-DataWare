<?php
include('database.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <main class="">
     <!-- affichage -->
     <header class="w-[100%] bg-gray-900 py-5 text-white flex flex-row justify-around">
        <h2 class="ml-5 w-2/5">DataWare</h2>
        <form action="index.php" method="post" class="w-3/5 flex flex-row justify-evenly ">
        <input type="submit" value="afficher les equipes" name="equipe" class="cursor-pointer">
        <input type="submit" value="afficher les personnels" name="personnels" class="cursor-pointer">
        <input type="submit" value="log out" name="logout"> 
    </form>
     </header>
    

    <section class="w-[100%] h-[50vh] flex flex-col justify-center">
    <form action="index.php" method="post" class="bg-gray-900 w-2/5 text-white p-10 flex flex-col gap-10 rounded-lg ml-5">
        <input type="text" placeholder="enter your email"  name="emlog">
        <input type="password" placeholder="enter your password"  name="passlog">
        <input type="submit" value="Log in"  name="login" class="cursor-pointer">
    </form>
    </section>


    </main>
</body>
</html>

<?php
if (isset($_POST["equipe"])) {
    $sql = "SELECT * FROM equipe";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        ?>
        <table class="w-[100%] flex flex-col items-center">
            <tr class="flex gap-10">
                <th>Equipe ID</th>
                <th>Equipe Nom</th>
                <th >Date de Création</th>
            </tr>
            <tr></tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr class="flex">
                    <td class="w-[100%] flex flex-row "><?php echo $row['equipe_id']; ?></td>
                    <td class="w-[100%] flex flex-row "><?php echo $row['equipe_nom']; ?></td>
                    <td class="w-[100%] flex flex-row "><?php echo $row['date_de_creation_equipe']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
}
?>


<?php
if(!empty($_POST["personnels"])){
    $sql = "SELECT * FROM personnel";
    $result = mysqli_query($conn, $sql);
    if($result){
        ?>
        <table class="w-[100%] flex flex-col items-center">
            <tr class="flex gap-10">
                <th class="w-[100%]">Personnel ID</th>
                <th class="w-[100%]">Personnel Nom</th>
                <th class="w-[100%]">Personnel prénom</th>
                <th class="w-[100%]">Personnel email</th>
                <th class="w-[100%]">Personnel telephone</th>
                <th class="w-[100%]">Personnel role</th>
                <th class="w-[100%]">equipe id</th>
                <th class="w-[100%]">personnel status</th>
            </tr>
            <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr class="flex ml-10 w-[100%] items-center">
            <th class="w-[100%] flex flex-row ml-15"><?php echo $row['personnel_id'];?></th>
            <th class="w-[100%] flex flex-row ml-15 "><?php echo $row['personnel_nom'];?></th>
            <th class="w-[100%] flex flex-row ml-15 "><?php echo $row['personnel_prénom'];?></th>
            <th class="w-[100%] flex flex-row ml-15"><?php echo $row['personnel_email'];?></th>
            <th class="w-[100%] flex flex-row ml-15"><?php echo $row['personnel_telephone'];?></th>
            <th class="w-[100%] flex flex-row ml-15"><?php echo $row['personnel_role'];?></th>
            <th class="w-[100%] flex flex-row ml-15"><?php echo $row['equipe_id'];?></th>
            <th class="w-[100%] flex flex-row ml-15"><?php echo $row['personnel_status'];?></th>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
    }
}
?> 
<?php 
$email = $_POST['emlog'];
$password = $_POST['passlog'];
// $passhash = password_hash($password, PASSWORD_DEFAULT);
$sql = "SELECT personnel_email , personnel_password FROM personnel
WHERE personnel_role = 'admin' ";
$result= mysqli_query($conn,$sql);
if($result)
{
    while($row= mysqli_fetch_assoc($result)){   
        $passwordc= $row['personnel_password'];
        $mail=$row['personnel_email'];
    if($password==$passwordc && $email == $mail ){ 
        $_SESSION['password']=$passwordc;
        $_SESSION['mail']=$mail;
        header("location:inter.php");
    } 
}
}
if(isset($_POST['logout'])){
    session_destroy();
    $_SESSION['password']="";
    $_SESSION['mail']="";
    header("location:index.php");
}

?>
