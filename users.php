<?php
/**
 * Created by PhpStorm.
 * User: SIGP
 * Date: 11/24/2020
 * Time: 5:24 PM
 */
 

header("Access-Control-Allow-Origin:*"); 
header("Access-Control-Credencial:true"); 
header("Access-Control-Allow-Methods:POST, GET,PUT,DELETE,OPTIONS"); 
header("Access-Control-Request-Headers:x-request-witdh");
header("Access-Control-Allow-Headers:x-request-with, x-requested");   

require_once ("config/db.php");
require_once ("config/conexion.php");

$query = mysqli_query($con, 'SELECT * FROM  users');
    while ($row=mysqli_fetch_array($query))
    {
          $user_id=$row['user_id'];
          $fullname=$row['firstname']." ".$row["lastname"];
          $user_name=$row['user_name'];
        
          $vector[] = array('user_id'=>$user_id,'fullname'=>$fullname,'user'=>$user_name);
    }

echo json_encode($vector);



/*
        $array = array (['user_id'=>'test1', 'fullname'=> 'test2', 'user'=> 'test3'],
		['user_id'=>'test11', 'fullname'=> 'test22', 'user'=> 'test33']);
        echo json_encode($array);
		
		*/