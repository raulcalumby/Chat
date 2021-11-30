<?php 
    session_start();
    include_once "config.php";
    $fname    = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname    = mysqli_real_escape_string($conn, $_POST['lname']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //Checando email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //se o email for vailido
            //checar sql
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email ='{$email}'");
            if(mysqli_num_rows($sql) > 0 ){
                echo "seu email ja existe ";
            }else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    //Agora vamos pegar a imagem e ver se é jpg ou png
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpeg', 'jpg'];
                    if(in_array($img_ext, $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "images/" . $new_img_name)){
                            $status = "Online";
                            $random_id = rand(time(), 10000000);
                            $sql12 =  mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                 VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}','{$status}') ");
                            if($sql12){
                                $sql13 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql13) > 0){
                                    $row = mysqli_fetch_assoc($sql13);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "certo";
                                }
                            }else{
                                echo "Não deu certo";
                            }
                        }
                    }else{
                        echo "foto errada";
                    }
                }else{
                    echo "Escolha uma foto!";
                }
            }
        }else{
            echo " $email Email invalido";
        }
    }else{
        echo "Preencha todos os campos!";
    }
    
 
?>