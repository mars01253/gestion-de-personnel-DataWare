<?php
include("database.php");
session_start();
        $_SESSION['password'];
        $_SESSION['mail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>DataWare</title>
</head>
<body>
<header class="w-[100%] bg-gray-900 py-5 text-white flex flex-row justify-between">
        <h2 class="ml-5 w-2/5">DataWare</h2>
        <form action="inter.php" method="post" class="w-3/5 flex flex-row justify-evenly ">
        <input type="submit" value="modifier les equipes" name="linkequipe">
        <input type="submit" value="modifier les personnels" name="linkpersonnel">
    </form>
     </header>

</body>
</html>
<?php
if(isset($_POST['linkequipe'])){
    header("location: lesequipes.php");
    exit;
}
if(isset($_POST['linkpersonnel'])){
    header("location: personnel.php");
    exit;
}

?>