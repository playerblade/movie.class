<a href="<?= Route::link("/person/create")?>">
    Add Persons
</a><br><br>
<form action="<?=Route::link("/person")?>" method="get">
    Name:
    <input type="text" name="name" value="<?= $filter['name'] ?? "" ?>"/>

    <label >
        <input type="radio" name="gender" value="0" >
        All
    </label>
    <?php foreach ($genders as $gender){ ?>
        <label >
            <input type="radio" name="gender" value="<?= $gender['code'] ?>" <?= $gender['checked'] ?>/>
            <?= $gender['name']?>
        </label>
    <?php }?>

    Country:

    <select name="country_id" >
        <option value="0"> All Countryes</option>
        <?php foreach ($countries as $country){ ?>
            <option value="<?= $country['id']?>"<?= $country['selected']?>>
                <?= $country['country_name']?>
            </option>
        <?php } ?>
    </select>

    <input type="submit" value="Filter"/>
    <a href="<?= Route::link("/person")?>">reset</a>
</form>
<h2>List Of Persons</h2>
<table border="1">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Last Name</td>
        <td>Age</td>
        <td>Gender</td>
        <td>Country</td>
<!--        <td>Description</td>-->
        <td>Options</td>
    </tr>
    <?php  foreach ($data as $person){ ?>
    <tr>
        <td><?= $person['id']?></td>
        <td><?= $person['name']?></td>
        <td><?= $person['lastname']?></td>
        <td><?= $person['age']?></td>
        <td><?= $person['gender_name']?></td>
        <td><?= $person['country_name']?></td>
<!--        <td>--><?//= $person['description']?><!--</td>-->
        <td>
            <a href="<?= Route::link("/person/{$person['id']}")?>">[Show]</a>
            <a href="<?= Route::link("/person/{$person['id']}/edit")?>">[Edit]</a>
            <a href="<?= Route::link("/person/{$person['id']}/delete")?>">[Delete]</a>
        </td>
    </tr>
    <?php }?>
</table>