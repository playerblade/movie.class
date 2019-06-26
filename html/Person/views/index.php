<a href="<?= Route::link("/person/create")?>">
    Add Persons
</a>
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