<html>
<head>
    <title>Home page</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    
</head>

<body>
    
    <nav>
       <div id="navbar">
        <a href=""><i class="fa fa-power-off"></i></a>
        <a href=""><i class="fa fa-expand"></i></a>
        <div style="clear: both;"></div>
       </div>

    </nav>
    <h1>Hi, Welcome back!</h1>
    <div class="container" id="maindiv" >
        <h2>BASIC</h2>
        <button onclick="details()" id="detailsbutton">Details</button>
        <button onclick="plans()" id="plansbutton">Plans</button>
        <button onclick="classes()" id="classesbutton">Classes</button>
    <div id="classes" style="display:none;">
    <table>
        <thead>
                <tr>
                    <th>Id</th>
                    <th>Class Price</th>
                    <th>Class Name</th>
                    <th>Class Short Description</th>
                    <th>Class Date</th>
                    <th>Class Duration</th>
                    <th>Class Member Limit</th>
                    <th>Class Level</th>
                    <th>Class Benefits</th>
                    <th>Class Trainer</th>
                    <th>Class Status</th>
                </tr>
         </thead>
         <tbody>

         <?php 
         $dbServername = "localhost";
         $dbUsername = "root";
         $dbPassword = "";
         $dbName = "assignment_innovatia";
         $conn= mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
         $sql = " SELECT * FROM classes;";
         $result = mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
                   if($resultCheck > 0){
                       while($row=mysqli_fetch_assoc($result)){
                           echo "<tr>";
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['class_price']."</td>";
                                echo "<td>".$row['class_name']."</td>";
                                echo "<td>".$row['class_short_description']."</td>";
                                echo "<td>".$row['class_date']."</td>";
                                echo "<td>".$row['class_duration']."</td>";
                                echo "<td>".$row['class_member_limit']."</td>";
                                echo "<td>".$row['class_level']."</td>";
                                echo "<td>".$row['class_benefits']."</td>";
                                echo "<td>".$row['class_trainer']."</td>";
                                echo "<td>".$row['class_status']."</td>";
                            echo "</tr>";
                       }
                      }


        ?> 
        </tbody>  
    </table>               
    </div>
    <?php 
        
         $sql = " SELECT * FROM plans;";
         $result = mysqli_query($conn,$sql);
         $resultCheck=mysqli_num_rows($result);
         if($resultCheck > 0){
            while($row=mysqli_fetch_assoc($result)){
   

         echo'
         <div id="plans">
            <div class="masterdiv">
                <div class="heading">Id : </div>
                <div class="content">'.$row['id'] .'</div>
            </div>';
            echo
            '<div class="masterdiv">
                <div class="heading">Plan Subcat Id : </div>
                <div class="content">'.$row['plan_subcat_id'] .'</div>
            </div>';
          echo'
            <div class="masterdiv">
                <div class="heading">Plan name : </div>
                <div class="content">'.$row['plan_name'] .'</div>
            </div>';

            echo'
            <div class="masterdiv">
                <div class="heading">Plan Description : </div>
                <div class="content">'.$row['plan_description'] .'</div>
            </div>';
            echo'
            <div class="masterdiv">
                <div class="heading">Plan Total Workouts: </div>
                <div class="content">'.$row['plan_total_workouts'] .'</div>
            </div>';

            echo'
            <div class="masterdiv">
                <div class="heading">Plan Workouts Description : </div>
                <div class="content">'.$row['plan_workouts_description'] .'</div>
            </div>';
             
            echo'
            <div class="masterdiv">
                <div class="heading">Plan Avg Duration : </div>
                <div class="content">'.$row['plan_avg_duration'] .'</div>
            </div>';

            echo'
            <div class="masterdiv">
                <div class="heading">Duration Unit : </div>
                <div class="content">'.$row['duration_unit'] .'</div>
            </div>';
            
            echo'
            <div class="masterdiv">
                <div class="heading">Plan Total Weeks : </div>
                <div class="content">'.$row['plan_total_weeks'] .'</div>
            </div>';

            echo'
            <div class="masterdiv">
                <div class="heading">Plan Image: </div>
                <div class="content"> <img src='.$row['plan_image'] .' height="300px"></div>
            </div>';
             
            echo'
            <div class="masterdiv">
                <div class="heading">Plan Level : </div>
                <div class="content">'.$row['plan_level'] .'</div>
            </div>';

            echo'
            <div class="masterdiv">
                <div class="heading">Status : </div>
                <div class="content">'.$row['status'] .'</div>
            </div>';
            }
        }
        ?>
        </div>
        <div id= "details" style="display:none;">
        <table>
        <thead>
                <tr>
                    <th>membership name</th>
                    <th>membership duration</th>
                    <th>membership classes</th>
                    <th>membership price</th>
                    <th> membership_discount_percentage</th>
                    <th>membership status</th>
                    <th>plan/class</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Duration</th>

                </tr>
         </thead>
         <tbody>

         <?php 
           
         
         $selectquery = "SELECT * FROM master";
         $returnvalue = mysqli_query($conn, $selectquery );//object is returned
         //print_r($returnvalue);
         if(!empty($returnvalue))
         {
             while($rowdata = mysqli_fetch_assoc($returnvalue))//converting object to array,row obtained
            {
                $id = $rowdata['membership_id'];
                //echo $id;
                $query2 = "SELECT * FROM membership WHERE id=$id";
                $resultquery2 = mysqli_query($conn,$query2);
                //print_r($resultquery2);
                if(!empty($resultquery2))
                {
                    while($finalresult = mysqli_fetch_assoc($resultquery2))//convert to array
                    {
                        //print_r($finalresult); 
                        echo '<tr>';
                        echo '<td>'.$finalresult['membership_name'].'</td>';
                        echo '<td>'.$finalresult['membership_duration'].'</td>';
                        echo '<td>'.$finalresult['membership_classes'].'</td>';
                        echo '<td>'.$finalresult['membership_price'].'</td>';
                        echo '<td>'.$finalresult['membership_discount_percentage'].'</td>';
                        echo '<td>'.$finalresult['membership_status'].'</td>';
                        //echo '</tr>';

                    }

                }


                $type = $rowdata['type'];
                $classorplanid = $rowdata['key_id'];
                if($type == 'class')
                {   
                    $query3 = mysqli_query($conn,"SELECT * FROM classes WHERE id= $classorplanid");//object
                    if(!empty($query3))
                    {//object to array
                        while($finalresult = mysqli_fetch_assoc($query3))//convert to array
                        {     
                             //print_r($finalresult);
                             echo '<td>'.$type.'</td>';
                             echo '<td>'.$finalresult['class_name'].'</td>';
                             echo '<td>'.$finalresult['class_short_description'].'</td>';
                             echo '<td>'.$finalresult['class_duration'].'</td>';
                             echo '</tr>';


                        }


                    }
                }
                if($type == 'plan')
                {   
                    $query3 = mysqli_query($conn,"SELECT * FROM plans WHERE id= $classorplanid");//object
                    if(!empty($query3))
                    {//object to array
                        while($finalresult = mysqli_fetch_assoc($query3))//convert to array
                        {     
                             //print_r($finalresult);
                             echo '<td>'.$type.'</td>';
                             echo '<td>'.$finalresult['plan_name'].'</td>';
                             echo '<td>'.$finalresult['plan_description'].'</td>';
                             echo '<td>'.$finalresult['plan_avg_duration'].'</td>';
                             echo '</tr>';


                        }


                    }
                }


            }
            
    
        }
        ?> 
        </tbody>  
    </table>               
    </div>


        
         
         
         
     
    
</div>
    <script>
        function details()
        { 
            document.getElementById('details').style.display ='block';
            document.getElementById('plans').style.display ='none';
            document.getElementById('classes').style.display ='none';
        }
        function plans()
        {   
            document.getElementById('details').style.display ='none';
            document.getElementById('plans').style.display ='block';
            document.getElementById('classes').style.display ='none';
        }
        function classes()
        {  
            document.getElementById('details').style.display ='none';
            document.getElementById('plans').style.display ='none';
            document.getElementById('classes').style.display ='block';
        }
    </script>
</body>




</html>
