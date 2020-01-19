<?php 
include('../includes/connection.php');
include("../includes/header.php");
if(isset($_POST['add_image'])){
    //Get data from files
    $image  = $_FILES['gallary_image']['name'];
    $tmp_name   = $_FILES['gallary_image']['tmp_name'];	
    $path       = "upload/";
    move_uploaded_file($tmp_name, $path.$image);

	
	$query = "insert into gallary(gallary_image) values('$image')";
	//perform query
	mysqli_query($conn,$query);
    //stop inserting data in the database when refreshing the page
    echo '<script>window.top.location="manage_gallary.php"</script>'; 
    exit;

}
?>
<section class="content">
        <div class="container-fluid">
        	
            <div class="block-header">
                <h2>Manage Gallary</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                New Image
                            </h1>
                            
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                            	<label for="admin_name">Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="admin_name" name="gallary_image" class="form-control">
                                    </div>
                                </div>
                                <button name="add_image" class="btn btn-primary m-t-15 waves-effect">Add Image</button>
                                </div>
                                
                                		
                                
                            </form>
                        </div>
                    </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Images
                               
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Edite</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                           //to Read from database
                                            $query     = "SELECT * FROM gallary";
                                            $result    = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['gallary_id']}</td>";
                                                 echo "<td><img src='upload/{$row['gallary_image']}' height=200px width=200px/></td>";
                                                
                                                echo "<td><a href='edit_gallary.php?gallary_id={$row['gallary_id']}' class='btn btn-warning'>Edit</a></td>";
                                                echo "<td><a href='delete_gallary.php?gallary_id={$row['gallary_id']}' class='btn btn-danger'>Delete</a></td>";
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

