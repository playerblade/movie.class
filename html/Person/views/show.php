<h2>
    Person Detail
    <a href="<?= Route::link("/person/{$person['id']}/edit")?>">[Edit]</a>
</h2>

<strong>Id:</strong>
<?= $person['id']?>
<br>
<strong>Name:</strong>
<?= $person['name']?>
<br>
<strong>Las Name:</strong>
<?= $person['lastname']?>
<br>
<strong>Age:</strong>
<?= $person['age']?>
<br>
<strong>Gender:</strong>
<?= $person['gender_name']?>
<br>
<strong>Description:</strong>
<?= $person['description']?>
<br>