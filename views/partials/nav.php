<nav>
        <div>
                <!-- <img src="" alt="Logo"> -->
                <a href="/" class="logo"><h1>Matlik_Official</h1></a>
        </div>
        <div id="nav-buttons">
                <a href="/"><h3>Home</h3></a>
                <!-- <a href="/about">About Me</a> -->
                <a href="/work"><h3>Work</h3></a>
                <a href="/contact"><h3>Contact</h3></a>
                <?php
                        
                        
                                if (isset($_SESSION['email'])) {
                                        
                                        ?>
                                                <a href="/logout"><h3><?php echo $_SESSION['first_name']; ?></h3></a>
                                        <?php
                                }
                        
                        ?>
                
        </div>

</nav>