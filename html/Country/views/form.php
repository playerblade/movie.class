<h2>Country Form</h2>

<form action="<?= $action ?>" method="post">
    Name:
    <br/>
    <input type="text" name="name" value="<?= $country['name'] ?? "" ?>"/><!--las ?? "" = hacer un if con variable var-->
                                                            <!--- el error es porque no tiene settings para php 7-->
<!--    de update puede ir a detalle-->
    <br/>

    <input type="submit" value="save"/>
</form>
