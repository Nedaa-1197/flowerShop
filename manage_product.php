 <?php 
	include('../includes/connection.php');
    include("../includes/header.php");
    if(isset($_POST['add_product'])){
	$pro_name    = $_POST['pro_name'];
	$pro_price   = $_POST['pro_price'];
    $pro_desc   = $_POST['pro_desc'];
    $category_id = $_POST['category_id'];
    $pro_image   = $_FILES['pro_image']['name'];
    $tmp_name    = $_FILES['pro_image']['tmp_name']; 
    $path        = "upload/";
    move_uploaded_file($tmp_name, $path.$pro_image);
    
	
	$query = "INSERT INTO product(pro_name,pro_price,pro_desc ,category_id,pro_image) VALUES('$pro_name','$pro_price','$pro_desc',$category_id', '$pro_image')";

    //perform query
    mysqli_query($conn,$query);
    //stop inserting data in the database when refreshing the page
    echo '<script>window.top.location="manage_product.php"</script>';
    exit;
}
?> 

<!-- Vertical Layout | With Floating Label -->
 <section class="content">
        <div class="container-fluid">
        	
            <div class="block-header">
                <h2>Manage Product</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                New Product
                            </h1>
                            
                        </div>
                        <div class="body">
                            <form method="post" enctype="multipart/form-data">
                            	<label for="admin_name">Product Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="admin_name" name="pro_name" class="form-control" placeholder="Enter your product name">
                                    </div>
                                </div>
                                <label for="email_address">Product Price</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="price" name="pro_price" class="form-control" placeholder="Enter your product price">
                                    </div>
                                    <label for="email_address">Product description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="price" name="pro_desc" class="form-control" placeholder="Enter your product description">
                                    </div>
                                </div>
                                <label for="password">Product Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="image" name="pro_image" class="form-control">
                                    </div>
                                </div>
                                 <div class="col-12 col-md-9">
                                        <select  id="select" class="form-control" name="category_id"  >
                                            <option >Please select</option>
                                            <?php 
                                            $query = "SELECT * FROM category";
                                            $result= mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                            }

                                            ?>
                                        </select> 
                                    </div> 
                                
                                		<br>
                                <button name="add_product" class="btn btn-primary m-t-15 waves-effect">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Products
                               
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>product image</th>
                                        <th>category #</th>
                                        <th>category</th> 
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
                                           //to Read from database
                                            $query     = "SELECT * FROM product
                                            INNER JOIN category ON category.category_id = product.category_id";
                                            $result    = mysqli_query($conn,$query);
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<tr>";
                                                echo "<td>{$row['pro_name']}</td>";
                                                echo "<td>{$row['pro_price']}</td>";
                                                 echo "<td><img src='upload/{$row['pro_image']}' height=200px width=200px/></td>";
                                                echo "<td>{$row['category_id']}</td>";
                                                echo "<td>{$row['category_name']}</td>";
                                                echo "<td><a href='edit_product.php?product_id={$row['product_id']}&category_id={$row['category_id']}' class='btn btn-warning'>Edit</a></td>";
                                                echo "<td><a href='delete_product.php?product_id={$row['product_id']}' class='btn btn-danger'>Delete</a></td>";
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
