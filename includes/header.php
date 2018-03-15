<header>
    <nav>
        <ul>
            <li><a href="index.php?page=home">Home</a></li>

            <?php
                if(!isset($_SESSION['nom'])){
                    echo "<li><a href='index.php?page=registration'>Registration</a></li>";
                    echo "<li><a href='index.php?page=login'>Login</a></li>";
                }
            ?>
        </ul>
    </nav>
    <div>
        <?php
        if(isset($_SESSION['nom'])){
            echo "<p>Bonjour ". $_SESSION['nom']." ".$_SESSION['prenom']."</p>";
            echo "<p><a href='index.php?page=compte'>compte</a></p>";
            echo "<p><a href='index.php?page=deconnexion'>deconnexion</a></p>";
        }
        ?>
    </div>
</header>