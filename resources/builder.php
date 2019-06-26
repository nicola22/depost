<!-- Hier wird die Seite zusammengebaut je nach request-->
<?php
    function build($page) 
    {
        ?>
    <!DOCTYPE html>
    <html>
        
        <?php require_once 'head.php'; ?> 
        
        <body>
            <header>
                <?php require_once 'header.php'; ?> 
            </header>
            <?php
            /*Hier wird geschaut ob der User sich schon eingeloggt hat,
            wenn ja dann wird die navigationreg genommen wenn nein dann die normaile Navigaion.*/ 
                if(isset($_SESSION['userdata'])){
            ?>
            <nav>
                <?php require_once 'navigationreg.php';?>
            </nav>
            <?php
            }
            else{
            ?>
            <nav>
                <?php require_once 'navigation.php';?> 
            </nav>
            <?php
            }
            ?>
            <main>
                <?php require_once './views/'.$page; 
                require_once './views/BackToTop.php'; ?> 
            </main>
            <footer>
                <?php require_once 'footer.php'; ?> 
            </footer>
        </body>
    </html>
    <?php
}
?>