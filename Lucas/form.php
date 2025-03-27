<?php

get_header();
var_dump($_POST);
if(isset($_POST['submitPostForm'])){
    var_dump($_POST);
}
echo date('h:i:s');

?>

<h2>Ajouter un custom post</h2>
<form method="post">
<label>Label</label><input type="text" name="input1">
<label>Label</label><input type="text" name="input2">
<input type="submit" name="submitPostForm" value="Ajouter" />
</form>

<?php