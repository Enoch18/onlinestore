<?php 
    include_once 'views/pages/admin/layouts/top_navbar.php';
    include_once 'views/pages/admin/layouts/sidebar.php';
    require_once 'Controllers/ProductsController.php';

    $response = '';

    /*
    Cheching if the condition is true for the value of posting submit.
    If it is true, the productscontroller class is instantiated then the method 
    of storing the data is called.
    */
    if(isset($_POST['submit'])){
        $products = new ProductsController();
        $response = $products->store();
    }

    /*
    Cheching if the condition is true for the value of posting delete.
    If it is true, the productscontroller class is instantiated then the method 
    of deleting is called.
    */
    if(isset($_POST['delete'])){
        $products = new ProductsController();
        $response = $products->destroy();
    }

    /*
    Cheching if the condition is true for the value of posting edit.
    If it is true, the productscontroller class is instantiated then the method 
    of updating is called.
    */
    if(isset($_POST['edit'])){
        $products = new ProductsController();
        $response = $products->update();
    }

    // instantiating the productscontroller class and calling the index method which displays all the products.
    $products = new ProductsController();
    $all_products = json_decode($products->index());

    /*
        Checking if the response from the methods is an array or a string
        if it is an array that means it has responded with some errors and 
        those errors and displayed. If it is a string it means that there were no 
        errors.
    */
    if(is_array($response)){
        $response = $response;
    }
?>

<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>

    <div class="card">
        <?php 
            if (!is_array($response)){
                // Displaying the response that has not errors
                if ($response != ''){
                    echo "
                        <div class='alert alert-success' id='response'>$response</div>
                    ";
                }
            }else{
                // Displaying the response that has errors from the array.
                echo "<div class='alert alert-danger' id='response'>";
                echo "<ul>";
                $name_error = $response[0];
                if (isset($name_error['name_error'])){
                    echo "<li>$name_error[name_error]</li>";
                }

                $description_error = $response[1];
                if (isset($description_error['description_error'])){
                    echo "<li>$description_error[description_error]</li>";
                }

                $price_error = $response[2];
                if (isset($price_error['price_error'])){
                    echo "<li>$price_error[price_error]</li>";
                }
                echo "</ul></div>";
            }
        ?>

        <h4 class="h4">Products</h4><br />

        <button class="btn btn-success" id="myBtn">Add Product</button>
        
        <!-- Table div and actual table for displaying all the products -->
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">thumbnail</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($all_products as $product){?>
                        <tr>
                            <th scope="row"><?php echo $product->id ?></th>
                            <td><?php echo $product->name ?></td>
                            <td>$<?php echo $product->price ?></td>
                            <td>
                                <img src="<?php echo $product->thumbnail ?>" style="width: 40px;" />
                            </td>
                            <td>
                                <button class="btn btn-success" onclick="editProduct(<?php echo $product->id; ?>, '<?php echo $product->name; ?>', '<?php echo $product->description; ?>', '<?php echo $product->thumbnail; ?>', <?php echo $product->price; ?>)"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger" onclick="deleteModal(<?php echo $product->id; ?>)"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- End of Table div and actual table for displaying all the products -->
    </div>

    <!-- The Modal for adding products -->
    <div id="myModal" class="modal">
        <!-- Modal content form -->
        <div class="modal-content">
            <span class="close">&times;</span>
            
            <h5 class="h5">Add Product</h5>
            <form class="form-group" method="POST" action="" enctype="multipart/form-data">
                <input type="text" name="name" class="form-control" placeholder="Product Name" /><br />

                <input type="text" name="price" class="form-control" placeholder="Price" /><br />

                <textarea name="description" class="form-control" placeholder="Description"></textarea><br />

                <input type="text" name="category" class="form-control" placeholder="Category" /><br />

                <input type="file" name="thumbnail" class="form-control" placeholder="Thumbnail" /><br />

                <input type="submit" class="btn btn-success" name="submit" value="Submit" />
            </form>
        </div>
    </div>

    <!-- The Modal for deleting products -->
    <div id="deleteModal" class="modal">
        <!-- Modal content form -->
        <div class="modal-content">
            <span class="close" id="span">&times;</span>
            
            <h5 class="h5">Are you sure you want to delete</h5>
            <div id="confirm_buttons"></div>
        </div>
    </div>

    <div id="editModal" class="modal">
        <!-- Modal content form -->
        <div class="modal-content">
            <span class="close" id="span_edit">&times;</span>
            
            <h5 class="h5">Edit Product</h5>
            <div id="edit_modal_content"></div>
        </div>
    </div>
</main>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    setTimeout(() => {
        var response = document.getElementById('response');
        response.style.display = "none";
    }, 5000);

    /*
        This method contains code for confirming delete of product and eventually deleting or
        not.
    */
    function deleteModal(id){
        // Modal for delete confirmation
        var delete_modal = document.getElementById('deleteModal');

        $("#deleteModal").show();
        $("#span").click(function(){
            $("#deleteModal").hide();
        });

        window.onclick = function(event) {
            if (event.target == delete_modal) {
                delete_modal.style.display = "none";
            }
        }

        $("#confirm_buttons").html(`
            <form action='' method='post'>
                <div style='display:flex; flex-direction:row;'>
                    <input type='hidden' name='delete_id' value=${id} />
                    <input type='submit' name='delete' style='min-width: 100px;' value='Yes' class='btn btn-danger' /> &nbsp; 
                    <span style='min-width: 100px;' class='btn btn-success' id='no'>No</span>
                </div>
            </form>`
        );

        $("#no").click(function(){
            $("#deleteModal").hide();
        });
    }

    /*
    This method displayes and closes the modal for editing the product.
    It also manipulates the dom, adding the product input fields that already have the values
    of the product.
    */
    function editProduct(id, name, description, thumbnail, price){
        $('#editModal').show();
        $('#span_edit').click(function(){
            $('#editModal').hide();
        });

        $('#edit_modal_content').html(`
            <form class="form-group" method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="${id}" />
                <input type="hidden" name="path_url" value="${thumbnail}" />
                <input type="text" name="name" class="form-control" value="${name}" /><br />

                <input type="text" name="price" class="form-control" value="${price}" /><br />

                <textarea name="description" class="form-control">${description}</textarea><br />

                <input type="text" name="category" class="form-control" placeholder="Category" /><br />

                <input type="file" name="thumbnail" class="form-control" placeholder="Thumbnail" /><br />

                <input type="submit" class="btn btn-success" name="edit" value="Submit" />
            </form>
        `);
    }
</script>

<?php include_once 'views/pages/admin/layouts/end.php' ?>