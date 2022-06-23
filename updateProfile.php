<?php

    class UpdateProfile
    {
        private $connect;
        private $id;


        public function __construct($username)
        {
            require_once "config.php";
            $db = new Database();
            $this->connect = $db->getConnect();
            $sql = mysqli_query($this->connect,"select cards.id as id from users inner join cards on cards.user_id = users.id where users.username = '$username'");
            if(mysqli_num_rows($sql)>0){
                $getSQL = mysqli_fetch_assoc($sql);
                $this->id = $getSQL['id'];
            }else{
                $sql_getUserID = mysqli_query($this->connect,"select * from users where username = '$username'");
                $getUserId = mysqli_fetch_assoc($sql_getUserID);
                $idUser = $getUserId['id'];
                $insertCards = mysqli_query($this->connect,"insert into cards(user_id) values($idUser)");
                $sql_getCardID = mysqli_query($this->connect,"select cards.id as id from users inner join cards on cards.user_id = users.id where users.id = $idUser");
                $getCardId = mysqli_fetch_assoc($sql_getUserID);
                $this->id = $getCardId;
            }


        }

        public function getCardId(){
            return $this->id;
        }

        public function updatePhone($phone){
            mysqli_query($this->connect,"update cards set phone = '$phone' where id = '$this->id'");
        }

        public function updateEmail($email){
            mysqli_query($this->connect,"update cards set email = '$email' where id = '$this->id'");
        }

        public function updateInfomation($name,$regency,$description){
            mysqli_query($this->connect,"update cards set name = '$name',regency='$regency',description='$description' where id = '$this->id'");
        }

        public function updateFullInfo($name,$regency,$description,$image){
            mysqli_query($this->connect,"update cards set name = '$name',regency='$regency',image='$image',description='$description' where id = '$this->id'");
        }

        public function updateImageInfomation($image){
            mysqli_query($this->connect,"update cards set image='$image' where id = '$this->id'");
        }

        public function updateBanks($bank_id,$acc_holder,$acc_number){
            $rowcount = mysqli_num_rows(mysqli_query($this->connect,"select * from card_bank where card_id = $this->id and bank_id = $bank_id"));
            if($rowcount>0){
                mysqli_query($this->connect,"update card_bank set acc_holder = '$acc_holder',acc_number = '$acc_number' where card_id = $this->id and bank_id = $bank_id");
            }else{
                mysqli_query($this->connect,"insert into card_bank(card_id,bank_id,acc_holder,acc_number) values($this->id,$bank_id,'$acc_holder','$acc_number')");
            }
        }

        public function updateSocials($social_name,$icon){
            $rowcount = mysqli_num_rows(mysqli_query($this->connect,"select * from socials where name = '$social_name'"));
            if($rowcount == 0){
                mysqli_query($this->connect,"insert into socials(name,icon) values('$social_name','$icon')");
            }
        }

        public function updateSocialCard($social_id,$link){
            $rowcount = mysqli_num_rows(mysqli_query($this->connect,"select * from card_social where card_id = $this->id and social_id = $social_id"));
//            print_r($rowcount);
            if($rowcount>0){
                mysqli_query($this->connect,"update card_social set link = '$link',status=1 where card_id = $this->id and social_id = $social_id");
            }else{
                mysqli_query($this->connect,"insert into card_social(card_id,social_id,link,status,count) values($this->id,$social_id,'$link',1,0)");
            }
        }

        public function ShowInformation_Card(){
            $getTable = mysqli_fetch_assoc(mysqli_query($this->connect,"select * from cards where id = $this->id"));
            return $getTable;
        }

        public function getInfoCardBanks($bank_id){
            $getTable = (mysqli_query($this->connect,"select * from card_bank where card_id = $this->id and bank_id=$bank_id"));
            if(mysqli_num_rows($getTable)>0){
                return $getTable;
            }
            return null;
        }

        public function getInfoCardSocials($social_id){
            $getTable = (mysqli_query($this->connect,"select * from card_social where card_id = $this->id and social_id=$social_id"));
            if(mysqli_num_rows($getTable)>0){
                return $getTable;
            }
            return null;
        }

        public function deleteSocialCard($social_id){
            mysqli_query($this->connect,"update card_social set status = 0,link='',position=0,count=0 where social_id = $social_id and card_id = $this->id");
        }

        public function checkSocialCard($social_id){
            $getTable = mysqli_query($this->connect,"select * from card_social where card_id = $this->id and social_id = $social_id and status = 1");
            if(mysqli_num_rows($getTable)>0){
                return 0;
            }
            return 1;
        }

        public function HandleOtherSocial($nameSocial,$icon,$link){
            $listSocial = mysqli_query($this->connect,"select * from socials limit 13");

            while($row = mysqli_fetch_assoc($listSocial)){
                $name = $row['name'];
                if(strcasecmp($nameSocial,$name)==0){
                    return -1;
                }
            }

            $checkContinue = mysqli_query($this->connect,"select * from card_social inner join socials on socials.id = card_social.social_id where card_social.card_id = $this->id and socials.name = '$nameSocial'");
            if(mysqli_num_rows($checkContinue)>0){
                return -1;
            }
            else{
                mysqli_query($this->connect,"insert into socials(name,icon) values('$nameSocial','$icon')");
                $getID = mysqli_fetch_assoc(mysqli_query($this->connect,"select * from socials order by id desc limit 1"));
                $social_id = $getID['id'];

                mysqli_query($this->connect,"insert into card_social(card_id,social_id,link,status,count) values($this->id,$social_id,'$link',1,0)");

                return $social_id;
            }
        }

        public function updateMore($position,$value){
            $sql = mysqli_query($this->connect,"select * from more_info where position = $position and card_id = $this->id");
            if(mysqli_num_rows($sql)>0){
                mysqli_query($this->connect,"update more_info set info = '$value' where position = $position and card_id = $this->id");
            }else{
                mysqli_query($this->connect,"insert into more_info(card_id,info,position) values($this->id,'$value',$position)");
            }
        }

        public function deleteMoreInfo($position){
            $stocknumbers = implode(",",$position);
            $sql = mysqli_query($this->connect,"delete from more_info where position not in ($stocknumbers) and card_id = $this->id");
        }

        public function deleteAllMore(){
            mysqli_query($this->connect,"delete from more_info where card_id = $this->id");
        }

        public function updateInterface($background,$sample,$filter,$image){
            $sql = mysqli_query($this->connect,"select * from interface_options where card_id = $this->id");
                if(mysqli_num_rows($sql)>0){
                    mysqli_query($this->connect,"update interface_options set background = $background,sample = $sample, filter = $filter,image = '$image' where card_id = $this->id");
                }else{
                    mysqli_query($this->connect,"insert into interface_options(card_id,background,sample,filter,image) values($this->id,$background,$sample,$filter,'$image')");
                }
        }

        public function updateInterfaceNotImage($background,$sample,$filter){
            $sql = mysqli_query($this->connect,"select * from interface_options where card_id = $this->id");
            if(mysqli_num_rows($sql)>0){
                mysqli_query($this->connect,"update interface_options set background = $background,sample = $sample, filter = $filter where card_id = $this->id");
            }else{
                mysqli_query($this->connect,"insert into interface_options(card_id,background,sample,filter) values($this->id,$background,$sample,$filter)");
            }
        }

        public function updatePosition($social_id,$position){
            mysqli_query($this->connect,"update card_social set position = $position where card_id=$this->id and social_id = $social_id");
        }


    }
?>


