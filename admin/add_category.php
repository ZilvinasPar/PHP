<?php require_once "inc/head.php"; ?>
<?php require_once "inc/header.php"?>
<?php require_once "../config/config.php";?>

<?php
$cat = new Category();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $category_name = $_POST['category_name'];
    $insert_category = $cat->insertCategory($category_name);

}

?>

<div class="row">
    <div class="col-md-6">

        <?php if(isset($insert_category)){
            echo $insert_category;
        } ?>
<form action="add_category.php" method="post">
    <input type="hidden" name="action" value="action">

    <input type="text" name="category_name" placeholder="Enter category name" class="form-group form-control"><br>

    <select name="category_status" class="form-group form-control">
        <?php foreach($cat->getAllCategory() as $child_cat){ ?>

            <?php if($child_cat['cat_parent_id'] == 0){ ?>

        <option value="0">Parent Categories</option>

                <option value="<?php echo $child_cat['cat_parent_id'] ?>"><?php echo $child_cat['cat_name']; ?></option>

            <?php } ?>
        <?php } ?>
        <option value="">---- Child  ---- </option>







    </select><br>

    <input type="submit" value="Add category" class="btn btn-success">
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
