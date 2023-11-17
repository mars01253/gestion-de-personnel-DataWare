<?php
include('database.php');

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
    <form action="personnel.php" method="get" class="w-[100%] bg-gray-900 py-5 text-white flex flex-row justify-around"><input type="submit" value="go back to main page" name="goback"></form>
    <section class="w-1/ flex justify-around mt-3 mb-5"><button class="bg-gray-900 text-white p-2 rounded-lg" id="ajp">ajouter une personnel</button><button class="bg-gray-900 text-white p-2 rounded-lg" id="mdep">modifier une personnel</button><button class="bg-gray-900 text-white p-2 rounded-lg" id="spep"> supprimer une personnel</button></section>
    <section class="flex flex-col items-center gap-5 "> 
    <!-- ajouter une personnel -->
    <div class="flex flex-col items-center " id="divajp">
    <form action="personnel.php" method="post" class="flex flex-col  gap-5  bg-gray-900 p-20 text-white" >
    <input type="text" placeholder="nom de personnel" name="nomper">
    <input type="text" placeholder="prénom de personnel" name="preper">
    <input type="text" placeholder="personnel email" name="peremail">
    <input type="text" placeholder="personnel telephone" name="telper">
    <input type="text" placeholder="personnel role" name="perrole">
    <input type="text" placeholder="equipe id" name="ideq">
    <input type="text" placeholder="personnel status" name="perstat">
    <input type="submit" value="ajouter" name="submit">
    </form>
    </div>
     <!-- modifier un personnel -->
     <div class="flex flex-col items-center  w-[80%]" id="divmdp">
    <form action="personnel.php" method="post" class="flex flex-col gap-5 bg-gray-900 p-20 text-white" >
    <input type="text" placeholder="personnel id" name="perid">
    <input type="text" placeholder="nom de personnel" name="nomper">
    <input type="text" placeholder="prénom de personnel" name="preper">
    <input type="text" placeholder="personnel email" name="peremail">
    <input type="text" placeholder="personnel telephone" name="telper">
    <input type="text" placeholder="personnel role" name="perrole">
    <input type="text" placeholder="personnel status" name="perstat">
    <input type="submit" value="modifier" name="modifier">
    </form>
    </div>
    <!-- suppression d'une personnel -->
    <div class="flex flex-col items-center w-[80%]" id="divsp">
    <form action="personnel.php" method="post" class="flex flex-col gap-5 bg-gray-900 p-20 text-white" >
    <input type="text" placeholder="id de personnel" name="perid">
    <input type="submit" value="supprimer" name="supprimer">
    </form>
    </div>
    </section>
    <script src="my.js"></script>
</body>
</html>
<?php
if(!empty($_POST['submit'])){
    $nomper = $_POST['nomper'];
    $preper = $_POST['preper'];
    $peremail = $_POST['peremail'];
    $telper = $_POST['telper'];
    $perrole = $_POST['perrole'];
    $ideq = $_POST['ideq'];
    $perstat = $_POST['perstat'];
    
    $sql = "INSERT INTO  personnel(personnel_nom,personnel_prénom,personnel_email,personnel_telephone,personnel_role,equipe_id,personnel_status)
    VALUES('$nomper','$preper','$peremail','$telper','$perrole','$ideq','$perstat')";
    mysqli_query($conn,$sql);
}
if(!empty($_POST['modifier'])){
    $nomper = $_POST['nomper'];
    $preper = $_POST['preper'];
    $peremail = $_POST['peremail'];
    $telper = $_POST['telper'];
    $perrole = $_POST['perrole'];
    // $ideq = $_POST['ideq'];
    $perstat = $_POST['perstat'];
    $perid = $_POST['perid'];
    if(!empty($nomper)){
        $sql =  
        "UPDATE personnel
        SET personnel_nom='$nomper' WHERE personnel_id = '$perid' ";
        mysqli_query($conn,$sql);
    }
    if(!empty($preper)){
        $sql =  "UPDATE personnel
        SET personnel_prénom='$preper' WHERE personnel_id = '$perid' ";
        mysqli_query($conn,$sql);
    }
    if(!empty($peremail)){
        $sql =  "UPDATE personnel
        SET personnel_email='$peremail' WHERE personnel_id = '$perid' ";
        mysqli_query($conn,$sql);
    }
    if(!empty($telper)){
        $sql =  "UPDATE personnel
        SET personnel_telephone='$telper' WHERE personnel_id = '$perid' ";
        mysqli_query($conn,$sql);
    }
    if(!empty($perrole)){
        $sql =  "UPDATE personnel
        SET personnel_role='$perrole' WHERE personnel_id = '$perid' ";
        mysqli_query($conn,$sql);
    }
    if(!empty($perstat)){
        $sql =  "UPDATE personnel
        SET personnel_nom='$nomper' WHERE personnel_id = '$perid' ";
        mysqli_query($conn,$sql);
    }
}
if(!empty($_POST['supprimer'])){
    $perid = $_POST['perid'];
    $sql = "DELETE FROM personnel
    WHERE personnel_id='$perid' ";
    mysqli_query($conn,$sql);
}
if(isset($_GET['goback'])){
    header("location: index.php");
}

mysqli_close($conn);

?>