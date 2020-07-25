<?php
include 'connect.php';

$page = $page=1;
if(!empty( $_GET['page'])){
    $page= $_GET['page'];
}
$limit= 5;
$offset= ($page - 1) * 5 ;


//for row count//



$lastpage= ceil(noOfRows() / $limit);
//var_dump($lastpage);





if (isset($_GET['search'])) {
    $stmt=$con->prepare("SELECT * FROM users WHERE username LIKE :username LIMIT :limit , :offset");
  
    $stmt->bindValue(':username', '%' . $_GET['search'] . '%', PDO::PARAM_INT);
} else { 
    $stmt= $con->prepare("SELECT * FROM users LIMIT :limit  OFFSET :offset");
}

$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);

$data = $stmt->fetchAll();

function noOfRows(){
   global $con;
    $sql = "SELECT count(*) FROM users"; 
$result = $con->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn();
return $number_of_rows;

}

?>

<html>
    <head>
        <title>
            forms
        </title>
    <style>
        * {
            box-sizing: border-box;
        }
     

        .main {
            display:flex;
            justify-content:space-between;
            background:DodgerBlue;
            padding:15px;
            align-items:center;
            width:1100px;
            margin:auto;
        }

       .table {
            display:flex;
            justify-content:center;
            padding:5px;
            width:1100px;
            margin:auto;
        }
        table {
            width:100%;
        }
        table td {
            padding:10px;
        }
        .Actions  {
            display:flex;
            justify-content:space-around;
        }
        .Actions button {
            background-color: black;
            border:none;
            color:white;
            padding: 10px 25px;
            cursor:pointer;
            border-radius:4px;
        }
        .Actions button:hover {
            background-color:#e7e7e7;
            color:black;
        }
        .main button{
            background-color:green;
            border:none;
            color:white;
            font-size:15px;
            padding: 10px 25px;
            cursor:pointer;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }
        .main input {
            text-indent:10px;
            border-radius: 2px;
            height:37px;
        }
        .main form {
            margin-bottom:0px;
        }
        .buttons button {
            background-color: black;
            border:none;
            color:white;
            padding: 10px 25px;
            cursor:pointer;
            border-radius:4px;
        }
        .buttons {
            display:flex;
            justify-content: space-around;
            align:center;
        }
    </style>
    </head> 
    <body>
        <div class="main">
            <form action="index.php" method="GET">
                <div class="search">  <input type="text" name = "search" placeholder="search" >
                <button type="submit">search</button></div>
            </form>
            <a href="forms.php" >
                <button type="button">create</button>
            </a>
        </div>
        <div class="table">
            <table border="1px">
                <tr>   
                    <th> S. No </th> 
                    <th>username</th>
                    <th>email</th>
                    <th>Action</th>
                   <!-- <th>Delete</th>-->
                </tr>   
                <?php foreach($data as $row) { ?>
                <tr>
                    <?php foreach($row as $value) { ?>
                        <td><?php echo $value; ?></td>
                    <?php } ?>
                
                <td>
                     <div class= "Actions">
                         <a href="edit.php?id=<?php $row['id']; echo $row['id']; ?>"><button type="button">Edit</button> </a>
                         <a href="delete.php?id=<?php $row['id']; echo $row['id'];?>"><button type="button">Remove</button></a>
                    </div>
                </td> 
                </tr>
               
                <?php } ?>
            </table>
        </div>
        <div class=buttons>
                <a href="index.php?page=<?php  echo $page - 1; ?> "><button type ="button"  <?php if($page == 1) { ?> disabled <?php   } ?>>  << Previous</button> </a>
                <a href="index.php?page=<?php  echo $page + 1; ?> "><button type ="button" <?php if($page == $lastpage) { ?> disabled <?php   } ?>> Next >> </button> </a>
        </div>        
    </body>
</html>