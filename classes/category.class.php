<?php



class Category
{

    private $db;
    private $help;
//================== Constructor ===================
    public function __construct()
    {
        $this->db = new Database();
        $this->help = new Helper();

    }
//========== End of constructor ==================

//==================== Insert new category =============================
public function insertCategory($category_name)
{
    $category_name = $this->help->validation($category_name);

    $category_name = mysqli_real_escape_string($this->db->link, $category_name);

    if(empty($category_name)){
        $errorMessage = "<p>You must enter category name</p>";

        return $errorMessage;
    }else{
        $query = "INSERT INTO e_category (cat_name) VALUES ('$category_name')";

        $insertCategory = $this->db->insert($query);

        if($insertCategory){
            $successMessage = "<p><span class='success'>You have successfully added new category.</span></p>";

            return $successMessage;
        }else{
            $errorMessage = "<p><span class='danger'>Category has not been added.</span></p>";

            return $errorMessage;
        }

    }

}
//============================

//============== Get all navigation categories =========================
public function getAllNavCategories($parent_id = 0, $children = NULL){

        $query = "SELECT * FROM e_category";

        $result = $this->db->getTable($query);

    $getChildren = array();

    foreach ($result as $children){

        if($children['cat_parent_id'] == $parent_id){

            $children['children'] = $this->getAllNavCategories($children['id'], $result);

            $getChildren[] = $children;
        }

    }
    return $getChildren;
        }
        //==========================================

//======================== Get all category ==========================
        public function getAllCategory(){

    $query = "SELECT * FROM e_category";
    $result = $this->db->getTable($query);

    return $result;
        }
    //=====================================

// ===================== Get categories by id ========================
        public function getCatById($id){

            $query = "SELECT * FROM e_category WHERE `id` = {$id}";

            $result = $this->db->getRow($query);

            $row = $result->fetch_assoc();

            return $row;

        }
//======================================

        //Update category==========

        public function update($category_name, $id)
        {
            $category_name = $this->help->validation($category_name);

            $category_name = mysqli_real_escape_string($this->db->link, $category_name);

            if(empty($category_name)){

                $errorMessage = "<p>You must enter category name</p>";

                return $errorMessage;

            }else{

                $update_query = "UPDATE e_category SET `cat_name` = '{$category_name}' WHERE `id` = '{$id}' LIMIT 1";

                $update_category = $this->db->insert($update_query);

                if($update_category){

                    $successMessage = "<p><span class='success'>You have successfully updated category.</span></p>";

                    return $successMessage;

                }else{
                    $errorMessage = "<p><span class='danger'>Category has not been updated.</span></p>";

                    return $errorMessage;
                }

            }

        }
//======================


//========= Delete category ====================
public function deleteCategory($id){

    $query = "DELETE FROM e_category WHERE `id` = '{$id}' LIMIT 1";

    $delete = $this->db->delete($query);

    if($delete){


        $successMessage = "<p style='text-align: center;'><span class='success'>Category successfully deleted.</span></p><br>";

        return $successMessage;
    }

}
//==============================================



}
