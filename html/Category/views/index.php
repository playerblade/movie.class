<a href="<?= Route::link("/category/create") ?>">
    Add category
</a>

<h2>List of categories</h2>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th></th>
    </tr>

    <?php foreach ($data as $category) { ?>
        <tr>
            <td>
                <?= $category['id'] ?>
            </td>
            <td>
                <?= $category['name'] ?>
            </td>
            <td>
                <!-- detail -->
                <a href="<?= Route::link("/category/{$category['id']}") ?>">
                    &#x1f50D
                </a>

                <!-- edit -->
                <a href="<?= Route::link("/category/{$category['id']}/edit") ?>">
                    &#9998
                </a>

                <!-- delete -->
                <a href="<?= Route::link("/category/{$category['id']}/delete") ?>">
                    &#10008
                </a>
            </td>
        </tr>
    <?php } ?>

</table>
