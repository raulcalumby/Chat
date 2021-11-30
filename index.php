<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    header("location: users.php");
}
?>

<?php include_once 'header.php';?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Chat com PHP</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-datails">
                    <div class="field input">
                        <label>Primeiro Nome</label>
                        <input type="text" name="fname" placeholder="nome" required>
                    </div>
                    <div class="field input">
                        <label>Sobrenome</label>
                        <input type="text" name="lname" placeholder="Sobrenome" required>
                    </div>
                    <div class="field input ">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="field input">
                        <label>Senha</label>
                        <input type="password" name="password" placeholder="senha" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Selecione uma imagem</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue para o chat">
                    </div>
                </div>
            </form>
            <div class="link">Você ja possui uma conta?<a href="login.php" >Entre aqui</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>