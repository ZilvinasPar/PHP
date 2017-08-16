<?php require_once "inc/head.php"; ?>
<?php require_once "inc/header.php"?>
<?php require_once "../config/config.php";?>
<?php

$cat = new Category();

$brand = new Brand();



if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['delete'])){
      $delete_category = $cat->deleteCategory($_GET['delete']);
    }
}

?>
<div class="panel-body no-padding" style="display: block;">
            <?php

            if(isset($delete_category)){
                echo $delete_category;
            }

            ?>
    <table class="table table-striped">
        <thead>
        <tr class="default">
            <th>#</th>
            <th>Category Name</th>
            <th>Parent/Children</th>
            <th>Edit Category</th>
            <th>Delete Category</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($cat->getAllCategory() as $categories){ ?>
        <tr>

            <td>#</td>
            <td><?php echo $categories['cat_name']; ?></td>
                <?php if($categories['cat_parent_id'] == 0){ ?>
                <td>Parent</td>
                    <?php }else{ ?>
                    <td>Children</td>
                    <?php } ?>
            <td><a href="cat_edit.php?edit=<?php echo $categories['id']; ?>" class="glyphicon glyphicon-pencil btn btn-default"> Edit</a></td>
            <td><a href="cat_list.php?delete=<?php echo $categories['id']; ?>" class="glyphicon glyphicon-trash btn btn-danger"> Delete</a></td>

        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>



<div class="clearfix"> </div>

<!--climate end here-->
</div>

<?php require_once "inc/footer.php"; ?>
</div>
</div>
<?php require_once "inc/sidebar.php"; ?>
