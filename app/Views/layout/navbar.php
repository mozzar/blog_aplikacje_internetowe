<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <strong>./MozzarBlog</strong>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
                Posty
            </a>

            <a class="navbar-item">
                Kategorie
            </a>


        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <?php
                    if(session()->get('is_logged')){
                    ?>
                        <a class="button is-info" href="/panel">
                            <i class="fas fa-user"></i>
                            &nbsp;
                            <?= session()->get('name')?>
                        </a>
                        <a class="button is-danger" href="/logout">
                            <strong>Wylogowanie</strong>
                        </a>

                    <?php
                    }else if(!session()->get('is_logged')){
                    ?>
                    <a class="button is-light" href="/login">
                        Zaloguj się
                    </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>