<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');

?>


<?php

        class product
        {
            private $db;
            private $fm;

            public function __construct()
            {
                $this->db = new Database();
                $this->fm = new Format();
            }
            public function search_product($tukhoa){
                $tukhoa = $this->fm->validation($tukhoa);   
                $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'";
                $result = $this->db->select($query);
                return $result;
            }
            // public function search_product($tukhoa){
            //     $tukhoa = $this->fm->validation($tukhoa);   
            //     $tukhoa = str_replace ("'","",$tukhoa);
            //     if(str_replace ("'","", $tukhoa)){
            //         $this->fm->validation->set_message('search_product','%s ko được chứa ký tự đặc biệt'. $tukhoa);
            //         return false;
            //     }else{
            //         return true;
            //     }
            //     }
            //     $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'";
            //     $result = $this->db->select($query);
            //     return $result;
            // }
            public function insert_product($data,$files) {

                $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
                $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
                $category = mysqli_real_escape_string($this->db->link, $data['category']);
                $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
                $price = mysqli_real_escape_string($this->db->link, $data['price']);
                $type = mysqli_real_escape_string($this->db->link, $data['type']);
                //Kiem tra hinh anh và lay anh cho vao folder upload
                $permited = array('jpg','jpeg','png','gif');
                 $file_name = $_FILES['image']['name'];
                 $file_size = $_FILES['image']['size'];
                 $file_temp = $_FILES['image']['tmp_name'];

                 $div = explode('.', $file_name);
                 $file_ext = strtolower(end($div));
                 $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                 $uploaded_image = "uploads/".$unique_image;
                
                  if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name=="") {
                    $alert = "<span class='error'>Fiels must be not empty</span>";      
                    return $alert;
                }else{   
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<span class='success'>Insert Product Successfully</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Insert Product Not Successfully</span>";
                        return $alert;
                    }
                    
                }
            }
            public function show_product(){
                
                // $query = "SELECT p.*, c.catName, b.brandName FROM tbl_product as p,tbl_category as c,tbl_brand as b where p.catId = c.catId and p.brandId = b.brandId order by p.productId desc" ;

                $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId order by tbl_product.productId desc" ;

                $result = $this->db->select($query);
                return $result; 
            }
            public function update_product($data,$files,$id){

                $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
                $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
                $category = mysqli_real_escape_string($this->db->link, $data['category']);
                $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
                $price = mysqli_real_escape_string($this->db->link, $data['price']);
                $type = mysqli_real_escape_string($this->db->link, $data['type']);
                //Kiem tra hinh anh và lay anh cho vao folder upload
                $permited = array('jpg','jpeg','png','gif');

                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                // $file_current = strtolower(current($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "uploads/".$unique_image;

                if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" ) {
                    $alert = "<span class='error'>Fields must be not empty</span>";          
                    return $alert;
                }else{
                    if(!empty($file_name)){
                        //Nếu ng dùng chọn ảnh
                        if($file_size >20480){
                            
                            $alert = "<span class='success'>Image Size should be less then 20MB!</span>";
                                return $alert;
                        }
                        elseif(in_array($file_ext,$permited) === false)
                        {
                            // echo "<span class='error'>You can upload only:- ".implode(',', $permited)."</span>"
                            $alert = "<span class='success'>You can upload only:- ".implode(',', $permited)."</span>";
                                return $alert;
                        }
                        $query = "UPDATE tbl_product SET 
                        productName = '$productName'
                        brandId = '$brand'
                        catId = '$category'
                        type = '$type'
                        price = '$price'
                        image = '$unique_image'
                        product_desc = '$product_desc'
                        WHERE productId ='$id'";
                    }else{
                        //Nếu ng dùng ko chọn ảnh
                        $query = "UPDATE tbl_product SET 
                        
                        productName = '$productName'
                        brandId = '$brand'
                        catId = '$category'
                        type = '$type'
                        price = '$price'
                        product_desc = '$product_desc'

                        WHERE productId ='$id'";
                    }                    

                    $result = $this->db->update($query);
                    if($result){
                        $alert = "<span class='success'>Product Updated Successfully</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Product Update Not Successfully</span>";
                        return $alert;
                    }
                    
                }
            }
            public function del_product($id){
                $query = "DELETE FROM tbl_product where productId = '$id'";
                $result = $this->db->delete($query);
                if($result){
                    $alert = "<span class='success'>Product Deleted Successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='error'>Product Deleted Not Successfully</span>";
                    return $alert;
                }
            }
            
            public function getproductbyId($id){
                $query = "SELECT * FROM tbl_product where productId = '$id'";
                $result = $this->db->select($query);
                return $result;
            }
            //End frontend
            //Start backend
            public function getproduct_feathered(){
                $query = "SELECT * FROM tbl_product where type = '0'";
                $result = $this->db->select($query);
                return $result;
            }

            public function getproduct_new(){
                $query = "SELECT * FROM tbl_product order by productId desc LIMIT 4";
                $result = $this->db->select($query);
                return $result;
            }

            public function get_details($id) {
                $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId where tbl_product.productId = '$id'" ;
                $result = $this->db->select($query);
                return $result;
            }

            public function getLastestBobui(){
                $query = "SELECT * FROM tbl_product WHERE brandId ='6' order by productId desc LIMIT 1";
                $result = $this->db->select($query);
                return $result;
            }
            public function getLastestDirtycoin(){
                $query = "SELECT * FROM tbl_product WHERE brandId ='3' order by productId desc LIMIT 1";
                $result = $this->db->select($query);
                return $result;
            }
            public function getLastestSwe(){
                $query = "SELECT * FROM tbl_product WHERE brandId ='2' order by productId desc LIMIT 1";
                $result = $this->db->select($query);
                return $result;
            }
            public function getLastestDegrey(){
                $query = "SELECT * FROM tbl_product WHERE brandId ='1' order by productId desc LIMIT 1";
                $result = $this->db->select($query);
                return $result;
            }
             
        }
        
?>