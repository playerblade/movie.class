<a href="<?= Route::link("/country/create")?>">
    Add Countries
</a>
<h2>List Of Countries</h2>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($data as $country){ ?>
    <tr>
        <td><?= $country['id']?></td>
        <td><?= $country['name']?></td>
        <td>
            <a href="<?= Route::link("/country/{$country['id']}")?>">[Show]</a>
            <a href="<?= Route::link("/country/{$country['id']}/edit")?>">[Edit]</a>
            <a href="<?= Route::link("/country/{$country['id']}/delete") ?>">[Delete]</a>
        </td>
    </tr>
    <?php }?>
</table>
