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
                                Orders
                               
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Address #</th>
                                        <th>Order Date</th>             
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                           //to Read from database
                                            $query     = "SELECT * FROM orders";
                                            $result    = mysqli_query($conn,$query);
                                            while($row =mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['order_id']}</td>";
                                                echo "<td>{$row['address_id']}</td>";
                                                echo "<td>{$row['order_date']}</td>";
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
