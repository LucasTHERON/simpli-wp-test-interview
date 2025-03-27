<?php

var_dump($_POST);
if(isset($_POST['submitPostForm'])){
    var_dump($_POST);
}
echo date('h:i:s');

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <?php get_header(); ?>

  <div id="content mycontent">
    <form method="post">
        <h2>Ajouter un custom post</h2>
        <div><label>Post name : </label><br><input type="text" name="input1"></div>
        <div><label>Meta : </label><br><input type="text" name="input2"></div>
        <div><label>Post content : </label><br><textarea rows='8' name="a"></textarea></div>
        <div><input type="submit" name="submitPostForm" value="Ajouter" /></div>
    </form>
  </div>
</body>
<style>
    body{
        background-color: rgb(235, 237, 245);
        color: #272727;
        max-width: 1280px;
        width: 90%;
        margin: auto;
        font-family: Inter, system-ui, Avenir, Helvetica, Arial, sans-serif;
        line-height: 1.5;
        font-weight: 400;
        text-align: center;
    }

    h2{
        font-size: 30px;
    }

    form{
        width: 320px;
        max-width: 95%;
        padding: 30px;
        font-size: 20px;
        background-color: rgba(255, 255, 255, 0.737);
        border-radius: 15px;
        box-shadow: 2px 3px 5px 1px  rgba(0, 0, 0, 0.193);
        margin: 50px auto;
    }

    input, textarea{
        padding: 5px 10px;
        border-radius: 8px;
        box-shadow: none;
        margin-bottom: 20px;
        width: 100%;
    }

    input[type=submit]{
        padding: 10px 15px;
        border-radius: 8px;
        color: white;
        font-size: 20px;
        letter-spacing: 2px;
        background-color: rgb(16, 116, 216);
        box-shadow: none;
        border:none;
        transition: all 0.1s linear;
    }

    input[type=submit]:hover{
        cursor: pointer;
        background-color: rgb(8, 89, 170);
    }
</style>
</html>

<?php