<?php
var_dump($_POST);
if(isset($_POST['submitPostForm'])){
    var_dump($_POST);
}

?>

<h2>Ajouter un custom post</h2>
<form method="POST">
    <div><label>Label</label><input type="text" name="input1"></div>
    <div><label>Label</label><input type="text" name="input2"></div>
    <div><input type="submit" name="submitPostForm" value="Ajouter" /></div>
</form>

<?php