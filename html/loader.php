<?php
/**
 * Created by PhpStorm.
 * User: jarda
 * Date: 12.6.2019
 * Time: 21:51
 */

session_start();

include "./config/config.php";
include "./db.php";
include "./functiones.php";

include "./Core/Route.php";

include "./Home/Controller.php";

include "./Auth/Controller.php";
include "./Auth/Auth.php";

include "./Category/Controller.php";
include "./Category/Category.php";

//incluimos Country
include "./Country/Controller.php";
include "./Country/Country.php";

//include Persons
include "./Person/Controller.php";
include "./Person/Person.php";

include "./Person/Gender.php";

