<?php
$id= $_GET['id'];
include 'connect.php';
$stmt=$con->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([ $_GET['id'] ]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();

//var_dump($result);
?>
<style>
.edit {
    background-image: linear-gradient(to right, red , indigo);
            display:flex;
            margin:auto;
            /*background:DodgerBlue;*/
            width:1100px;
            justify-content:space-around;
            align-items:center;
            padding:15px;
            flex-direction: column;
}


</style>
<form action="update.php" method="GET">
     <div class="edit">
            <h1> UPDATE ACCOUNT</h1>
            <input type="hidden" name="id" value=<?php echo $id; ?>>
            <input type="text" name="Name" placeholder="Name" value="<?php echo $result[0]['username']?>"> <br>
            <input type="text" name="email" placeholder="Email" value="<?php echo $result[0]['email']?>"><br>
            <input type="submit" value="update">
      </div>      
        </form>