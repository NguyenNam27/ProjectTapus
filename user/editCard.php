<?php
    @session_start();
    require_once "../updateProfile.php";
    if(isset($_SESSION['username'])){
        $edit = new UpdateProfile($_SESSION['username']);
        if(isset($_POST['name']) and isset($_POST['regency']) and isset($_POST['description'])){
            $name = $_POST['name'];
            $regency = $_POST['regency'];
            $description = $_POST['description'];

            $edit->updateInfomation($name,$regency,$description);
        };

        if(isset($_POST['name']) and isset($_POST['regency']) and isset($_POST['description']) and isset($_POST['image'])){
            $name = $_POST['name'];
            $regency = $_POST['regency'];
            $description = $_POST['description'];
            $image = $_POST['image'];

            $edit->updateFullInfo($name,$regency,$description,$image);
        };

        if(isset($_POST['phone'])){
            $phone = $_POST['phone'];
            $edit->updatePhone($phone);
        }

        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $edit->updateEmail($email);
        }

        if(isset($_POST['id_bank']) and isset($_POST['acc_holder']) and isset($_POST['acc_num'])){
            $id = $_POST['id_bank'];
            $acc_holder = $_POST['acc_holder'];
            $acc_num = $_POST['acc_num'];

            $edit->updateBanks($id,$acc_holder,$acc_num);
        }

        if(isset($_POST['social_id']) and isset($_POST['link'])){
            $social_id = $_POST['social_id'];
            $link = $_POST['link'];


            $edit->updateSocialCard($social_id,$link);
        }

        if(isset($_POST['social_id_check']) and isset($_POST['link_check'])){
            $social_id = $_POST['social_id_check'];
            $link = $_POST['link_check'];

            $response = $edit->checkSocialCard($social_id);
            echo $response;
        }

        if(isset($_POST['social_id']) and isset($_POST['position_social'])){
            $social_id=$_POST['social_id'];
            $position=$_POST['position_social'];

            $edit->updatePosition($social_id,$position);
        }

        if(isset($_POST['del_social_id'])){
            $del_social_id = $_POST['del_social_id'];

            $edit->deleteSocialCard($del_social_id);
        }

        if(isset($_FILES['file'])){
            $name = $_FILES['file']['name'];
            $name = time().$name;
            $location = '../images/uploads/'.$name;
            move_uploaded_file($_FILES['file']['tmp_name'], $location);
            $edit->updateImageInfomation($name);
        }

        if(isset($_POST['list'])){
            $list = $_POST['list'];
            if($list!=-1){
                $list_position = [];
                foreach ($list as $key => $value) {
                    if ($key != 0) {
                        $list_position[] = $key;
                        $edit->updateMore($key, $value);
                    }
                }
                $edit->deleteMoreInfo($list_position);
            }
            else{
                $edit->deleteAllMore();
            }
        }

        if(isset($_FILES['image_background']) and isset($_POST['background']) and isset($_POST['sample']) and isset($_POST['filter'])){
            $image = $_FILES['image_background']['name'];
            $image = time().$image;
            $location = '../images/interfaces/'.$image;
            move_uploaded_file($_FILES['image_background']['tmp_name'], $location);
            $background = $_POST['background'];
            $sample = $_POST['sample'];
            $filter = $_POST['filter'];

            $edit->updateInterface($background,$sample,$filter,$image);
        }

        if(isset($_POST['background']) and isset($_POST['sample']) and isset($_POST['filter'])){
            $background = $_POST['background'];
            $sample = $_POST['sample'];
            $filter = $_POST['filter'];

            $edit->updateInterfaceNotImage($background,$sample,$filter);
        }

        if(isset($_POST['listUpdate'])){
            $list = $_POST['listUpdate'];
            foreach($list as $key=>$value){
                $edit->updatePosition($key,$value);
            }
        }

        if(isset($_FILES['icon']) and $_POST['name'] and $_POST['link']){
            $icon = $_FILES['icon']['name'];
            $icon = time().$icon;
            $location = '../images/icons/'.$icon;
            move_uploaded_file($_FILES['icon']['tmp_name'], $location);
            $name = $_POST['name'];
            $link = $_POST['link'];

//            echo $edit->HandleOtherSocial($name,$icon,$link);
            $id = $edit->HandleOtherSocial($name,$icon,$link);
            if($id!=-1){
                echo json_encode(array('icon'=>$icon,'id'=>$id));
            }
            else echo 0;
        }
    }
?>