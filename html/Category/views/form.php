<h2>category Form</h2>

<form action="<?= $action ?>" method="post">
    Name:
    <br/>
    <input type="text" name="name" value="<?= $category['name'] ?? "" ?>"/>
    <br/>

    <input type="submit" value="save"/>
</form>
