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
    
    <title>DataWare</title>
</head>
<body>
   
    <form action="lesequipes.php" method="get" class="w-[100%] bg-gray-900 py-5 text-white flex flex-row justify-around"><input type="submit" value="go back to main page" name="goback"></form>
    <section class="w-1/ flex justify-around mt-3 mb-5"><button class="bg-gray-900 text-white p-2 rounded-lg" id="ajeq">ajouter une equipe</button><button class="bg-gray-900 text-white p-2 rounded-lg" id="mdeq">modifier une equipe</button><button class="bg-gray-900 text-white p-2 rounded-lg" id="speq"> supprimer une equipe</button></section>
    <!-- ajouter une equipe -->
    <section class="flex flex-col items-center gap-5"> 
     <div class="flex flex-col items-center hidden w-[80%]" id="divajq">
    <form action="lesequipes.php" method="post" class="flex flex-col  bg-gray-900 p-6 text-white">
    <input type="text" placeholder="nom d'equipe" name="nomequipe">
    <input type="submit" value="ajouter" name="submit">
    </form>
    </div>
     <!-- modifier le nom ou la date d'une equipe -->
     <div class="flex flex-col items-center hidden w-[80%]" id="divmdq">
    <form action="lesequipes.php" method="post" class="flex flex-col  bg-gray-900 p-6 text-white gap-5">
    <input type="text" placeholder="nom d'equipe" name="nomequipem">
    <input type="text" placeholder="date d'equipe" name="dateequipe">
    <input type="text" placeholder="id d'equipe" name="idequipe">
    <input type="submit" value="modifier" name="modifier">
    </form>
    </div>
    <!-- suppression d'une equipe -->
    <div class="flex flex-col items-center hidden  w-[80%]" id="divspq">
    <form action="lesequipes.php" method="post" class="flex flex-col  bg-gray-900 p-6 text-white gap-5">
    <input type="text" placeholder="id d'equipe" name="idequipe">
    <input type="submit" value="supprimer" name="supprimer">
    </form>
    </div>
    </section>
    <script src="my.js"></script>
</body>
</html>
<?php
if(!empty($_POST['submit'])){
    $nomequipe = $_POST['nomequipe'];
    $sql = "INSERT INTO  equipe(equipe_nom)
    VALUES('$nomequipe')";
    mysqli_query($conn,$sql);
}
if(!empty($_POST['modifier'])){
    $nomequipem = $_POST['nomequipem'];
    $dateequipem = $_POST['dateequipe'];
    $idequipem = $_POST['idequipe'];
    if(!empty($dateequipem)){
     $sql = "UPDATE equipe
    SET date_de_creation_equipe='$dateequipem' WHERE equipe_id='$idequipem' ";
    $result=mysqli_query($conn,$sql);
    }
    if(!empty($nomequipem)){
        $sql = "UPDATE equipe
        SET equipe_nom='$nomequipem' WHERE equipe_id='$idequipem' ";
        mysqli_query($conn,$sql);
       }
}
if(!empty($_POST['supprimer'])){
    $idequipem = $_POST['idequipe'];
    $sql = "DELETE FROM equipe
    WHERE equipe_id='$idequipem' ";
    mysqli_query($conn,$sql);
}
if(isset($_GET['goback'])){
    header("location: index.php");
}


?>