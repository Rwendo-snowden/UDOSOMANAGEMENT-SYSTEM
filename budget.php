<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>budget</title>
<style>

    h1{
        color: white;
    }
    body{
         background-color:rgb(223, 211, 211);
    }
    #head{
        background-color: rgb(22, 114, 114);
            height: 80px;
            margin-top: 0px;
            display: flex;
            justify-content: center;
            margin-bottom: 10px
    }
    #amount{
        
        display: flex;
        justify-content:center ;
        background-color: blue;
        color: white;
        height: 60px;
        font-size: 20px;

    }
    h3{
        font-size: 20px;
    }
    input{
        margin: 10px;
        display: block;
        height: 30px;
        width: 400px;
        border: none;
        border-radius: 4px;
    }
    button{
        border: none;
        border-radius: 3px;
        color:white;
        height: 30px;
        width: 60px;
    }
    button:hover{
        cursor: pointer;
    }
    #btn1{
        background-color: rgb(22, 114, 114);


    }
    #btn2{
        background-color: brown;
        
    }
    #bjt{
        width: 60%;
       
    }
    #second{
        float: left;
        margin-top: 20px;
        
    }

 table{
 border-collapse: collapse;
 
   
 }
 table,th,td{
     border-bottom: solid 2px wheat;
    
 }
 td{
     height: 30px;
     width: 200px;
     text-align: center;
 }
 tr:nth-child(even){
     background-color:rgb(22, 114, 114) ;
 }
 tr{
     background-color: rgb(175, 197, 197);
 }

 a{
     text-decoration: none;
     color:white;
 }
 #delete{
     background-color: rgb(96, 3, 3);
     border: none;
     border-radius: 2px;
 }
 #delete:hover{
     background-color: rgba(207, 9, 9,0.7);
 }

          
ul{

list-style-type: none;
width: 80%;
height: 500px;

color: rgb(94, 91, 91);

}
li {
text-decoration: none;
display: block;
color: white;
padding: 5px;
border-bottom: 1px solid #555;
}

.lst{
text-decoration: none;
color: white;
}

.lst:hover{
color: blue;
}


#nav{
    float: left;
    width: 220px;
    margin-right: 30px;
    background-color:rgb(25, 22, 22);
    border-radius: 2px;
    margin-left: 0px;
   padding: 0px;
}
#diff{
    width: 80%;
    background-color: brown;
    color: white;
    float: right;
    display: flex;
    justify-content: center;
    height: 50px; 
}


@media screen and (max-width:1110px){

#nav{
    width: 100%;
    height: 200px
}
#first{
    width: 100%;
}
#amount{
    width: 100%;
}
input[type="text"]{
    width: 200px;
}

input[type="number"]{
    width: 200px;
}
}
</style>  
</head>
<body>

<div id="head">
<h1> BUDGET</h1>
</div>
  <hr>

  <div id="nav"> 
       <ul>
        <li><a href="elimuOffice.php" class="lst">Home </a></li>
        <li><a href="news.php" class="lst">News</a></li>
        <li><a href="budget.php" class="lst">Budjet </a></li>
        <li><a href="generalreport.php" class="lst"> General Report </a></li>
        <li><a href="" class="lst"> suggestion forms </a></li>
        <li><a href="messages.php" class="lst">messages</a></li>
       </ul>
    </div>
  <div id="first">
  <?php

  include "databaseconnect.php";
  $chukua= "SELECT*FROM expenditure WHERE reason='budjet' AND ministry='education';";

  $matokeo=mysqli_query($conn,$chukua);
  
  if($matokeo->num_rows>0){

    while($row=$matokeo->fetch_assoc()){

     echo '<div id=amount>'."<br>"." The Total Budjet is :".$row['amount'] ."<br>".'</div>';
     $sa=$row['amount'];
    }
}

   
  ?>
  </div>

  <div id="bjt">
  <h3> Budjet calculations </h3>

  <form action="budgetdb.php" method="post">
    <label for="kiasi">AMOUNT: </label>
 <input type="number" name="kiasi" id="kiasi">
<br>

 <label for="sababu"> DESCRIPTION: </label>
 <input type="text" name="sababu" id="sababu">

 <button type="submit" id="btn1">Submit</button>
 <button type="reset" id="btn2">Clear</button>
  </form>

  </div>

  <div id="second">

  <?php
  
  $take="SELECT*FROM budget WHERE ministry='education'";
  $matokeo=mysqli_query($conn,$take);  

  if($matokeo->num_rows>0){
    echo "<table>";
    echo "<tr>";
    echo "<th> id";
    echo "<th> amount";
    echo "<th>   description";
    echo "</tr>";
    while($row=$matokeo->fetch_assoc()){
   //   while($row=mysqli_fetch_array($matokeo)){
    echo "<tr>";
   echo "<td id='dt11'> $row[id] </td>";
   echo "<td id='dt12'> $row[amount] </td>";
   echo "<td id='dt12'> $row[description] </td>";
   
   echo " <td > <button id='delete'> <a href='delete2.php?delete= $row[id]' >DELETE</a> </button></td>";
   
   echo " </tr>";
   }
   
   echo "</table>";
   
   }else{
   
   echo "there is an error";
   }

  ?>


<!--  -->
<br>
<br>

<?php

   $jumla="SELECT SUM(amount) FROM budget WHERE ministry='education';";

   $query=mysqli_query($conn,$jumla);

   while($row=mysqli_fetch_array($query)){

    echo "The total is:". $row['SUM(amount)'];

    $am=$row['SUM(amount)'];
   }

  
?>
  </div>

  <div id="diff">
<?php



if (isset($sa,$am)){

   $diff=$sa - $am ;
 echo '<div>'."<br>"." The Total Balance is :".$diff ."<br>".'</div>';
}

?>

  </div>
  

</body>
</html>