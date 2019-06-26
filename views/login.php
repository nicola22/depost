<!-- Hier wrid das Login zusammen gebaut.-->
<main>
    <h1 class = "ueberschrift">Login</h1> 
    <form class = "formular" action="checklogin" method = "post" >
        <input class = "form" type="text" placeholder = "Username*" name = "username"required>
        <br>
        <input class = "form" type="password" placeholder = "Passwort*" name = "pw"required>
        <br>
        <input class = "SigninSubmit" type="submit">    
    </form>
    <!-- Es wird geschaut ob in der Session ein error gespeichert wurde-->
    <?php
        if(isset($_SESSION['error']) && $_SESSION['error' =='login']){
            ?>
            <!-- Es wird eine Error ausgegeben-->
            <p class = "error"> Das Passwort oder der Benutzernmae ist falsch!</p>
            <?php
        }
    ?>
    <div class="divImgSignin">
    </div>
</main>
