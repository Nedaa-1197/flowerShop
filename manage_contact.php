<?php 
include('../includes/connection.php');
include("../includes/header.php");

?>
<section class="content">
        <div class="container-fluid">
          
            <div class="row clearfix">
                
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Customer Messages
                               
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                           //to Read from database
                                            $query     = "SELECT * FROM contact";
                                            $result    = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['contact_id']}</td>";
                                                echo "<td>{$row['first_name']}</td>";
                                                echo "<td>{$row['last_name']}</td>";
                                                echo "<td>{$row['email']}</td>";
                                                echo "<td>{$row['message']}</td>";
        
                                                echo "</tr>";
                                            }

                                           ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

</section>
