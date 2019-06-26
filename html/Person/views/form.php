<h2>Person Form</h2>

<form action="<?= $action ?>" method="post">
    Name:
    <br>
    <input type="text" name="name" value="<?= $person['name'] ?? ""?>"/>
    <br>
    Last Name:
    <br>
    <input type="text" name="lastname" value="<?= $person['lastname'] ?? ""?>" />
    <br>
    Age:
    <br>
    <input type="number" name="age" value="<?= $person['age'] ?? ""?>">
    <br>
    Gender:
    <br>
<!--    //$key  == gender en la clase gender.php-->
    <?php foreach ($genders as  $gender) {?>
        <label>
            <input type="radio" name="gender" value="<?= $gender['code']?>" <?= $gender['checked'] ?> />
            <?= $gender['name']?>
        </label>
    <?php }?>
    <br>
    <select name="country_id" id="">
        <option class="0">Select Countries</option>
        <?php foreach ($countries as $country){?>
            <option value="<?= $country['id']?> " <?= $country['selected'] ?> >

                <?= $country['country_name'] ?>

            </option>
        <?php }?>
    </select>
    <br>
    Description:
    <br>
    <textarea name="description">
        <?= $person['description'] ?? ""?>
    </textarea>
    <br>
    <input type="submit" value="save"/>

</form>