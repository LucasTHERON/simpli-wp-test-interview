<?php

$message = '';

if(isset($_POST['submitPostForm'])){
    if(!isset($_POST['title']) || !isset($_POST['meta'])){
        $message = '<p style="color: red">Veuillez ajouter un titre et une méta</p>';
    }else{
        $title = htmlspecialchars($_POST['title']);
        $meta = htmlspecialchars($_POST['meta']);
        if(!isset($_POST['meta'])){
            $content = 'Hello world !';
        }else{
            $content = htmlspecialchars($_POST['content']);            
        }

        // Création du post avec les données récupérées
        $post = array(
            'post_title'    => $title,
            'post_content'    => $content,
            'post_status'   => 'publish',
            'post_type'     => 'lucas_post',
            'meta_input'     => [
                'mymeta' => $meta
            ]
        );
        
        $insert_post = wp_insert_post($post);

        if($insert_post == 0){
            $message = '<p style="color: red">Il y a eu une erreur, merci d\'essayer plus tard</p>';
        }else{
            $message = '<p style="color: green">Votre post a bien été ajouté</p>';
        }
    }



}

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
        <div><label>Post name* : </label><br><input type="text" required name="title"></div>
        <div><label>Meta* : </label><br><input type="text" required name="meta"></div>
        <div><label>Post content : </label><br><textarea rows='8' name="content"></textarea></div>
        <div><input type="submit" name="submitPostForm" value="Ajouter" /></div>
    </form>
  </div>
  <?= $message ?? $message ?>
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
        border-width: 1px;
        border-color: #272727;
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