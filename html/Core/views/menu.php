
    <?php if (empty($_SESSION['user'])){?>
        <ul>

            <li>
                <a href="<?= Route::link('/login')?>">
                    Login
                </a>

            </li>

        </ul>
    <?php }else{?>
    <h2>
        <?= $_SESSION['user']['name']?>
    </h2>
    <ul>
    <li>
        <a href="<?= Route::link("") ?>">
            Home
        </a>
    </li>
    <li>
        <a href="<?= Route::link("/category") ?>">
            Categories
        </a>
    </li>
    <li>
        <a href="<?= Route::link("/country") ?>">
            Countries
        </a>
    </li>
    <li>
        <a href="<?= Route::link("/person") ?>">
            Persons
        </a>
    </li>
    <li>
        <a href="<?= Route::link("/logout")?>">
            Logout
        </a>
    </li>
    </ul>
    <?php }?>
