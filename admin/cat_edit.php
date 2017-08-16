<?php require_once "inc/head.php"; ?>
<?php require_once "inc/header.php"?>
<?php require_once "../config/config.php";?>

<?php

if(!isset($_GET['edit']) || $_GET['edit'] == NULL){
    echo "<script>window.location = 'cat_list.php';</script>";
    die();
}else{
    $id = $_GET['edit'];
}

$cat = new Category();
$categories = $cat->getCatById($id);

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $category_name = $_POST['category_name'];

    $update_category = $cat->update($category_name, $id);
}

?>

<div class="col-md-6 col-md-offset-1" id="edit_cat">

    <div class="col-md-6">
        <form action="" method="post">

            <?php

            if(isset($update_category)){
                echo $update_category;
            }

            ?>
            <input type="hidden" name="action" value="action">

            <input type="text" name="category_name" placeholder="" value="<?php echo $categories['cat_name'] ?>" class="form-group form-control"><br>


            <input type="submit" value="Edit category" class="btn btn-success">
        </form>
    </div>

</div>







<div class="clearfix"> </div>

<!--climate end here-->
</div>

<?php require_once "inc/footer.php"; ?>
</div>
</div>
<?php require_once "inc/sidebar.php"; ?>
