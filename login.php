<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    header("location: users.php");
}
?>
<?php include_once 'header.php';?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Chat com PHP</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="name-datails">
                    <div class="field input ">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                    <div class="field input">
                        <label>Senha</label>
                        <input type="password" name="password" placeholder="senha">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Entrar">
                    </div>
                </div>
            </form>
            <div class="link">Não tem uma conta?<a href="index.php" > Faça seu cadastro!</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>