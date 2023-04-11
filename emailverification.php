<?php
     require "db_connection.php";

   if(isset($_GET['email']) && isset($_GET['token_check'])) {
       $query = "SELECT * FROM `register_user` WHERE `email`='{$_GET['email']}' AND `token`='{$_GET['token_check']}'";
       $result_query=mysqli_query($con, $query);
       if($result_query)
       {
           if(mysqli_num_rows($result_query)==1)
           {
               $fetch_res=mysqli_fetch_assoc($result_query);
               if($fetch_res['token_ok']==0)
               {
                   $result_update="UPDATE `register_user` SET `token_ok`='1' WHERE `email`='$fetch_res[email]'";
                   if(mysqli_query($con, $result_update))
                   {
                     echo "<script>alert('Email Successfully Verified!');
                      window.location.href='login.php';</script>";
                
                   }
                   else{
                   echo "<script>alert('Can't run query!');
                       window.location.href='login.php';</script>";
                    
                   }
               }
               else
               {
                   echo "<script>alert('Email already verified!');
                   window.location.href='login.php';</script>";
                    
                                    
               }
           }
       }

       else{
           echo "<script>alert('Can't run query!');
                           window.location.href='login.php';</script>";
       }
   }
?> 


