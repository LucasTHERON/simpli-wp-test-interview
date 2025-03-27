<?php
$post = get_post();
$id = $post->ID;
$mymeta = get_post_meta($id, 'mymeta', true);
$colorbg = get_post_meta($id, 'colorbg', true);
$colorborder = get_post_meta($id, 'colorborder', true);
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="">
<?php get_header(); ?>
    <div class="post_content">
        <h1><?= $post->post_title ?></h1>
        <p class="meta">mymeta: <?= $mymeta ?></p>
        <p class="content"><?= $post->post_content ?></p>
    </div>
    <strong>Pour inverser le texte, faites un double click sur le contenu</strong>
    <br><br><br>
<?php get_footer() ?>
</html>

<style>
.post_content{
    background: <?= $colorbg ?>;
    border: 2px solid <?= $colorborder ?>;
    width: 450px;
    max-width: 95%;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 2px 3px 5px 1px  rgba(0, 0, 0, 0.193);
    margin: 50px auto;
}

body{
    max-width: 1280px;
    width: 90%;
    margin: auto;
    font-family: Inter, system-ui, Avenir, Helvetica, Arial, sans-serif;
    line-height: 1.5;
    font-weight: 400;
    text-align: center;
}

h1{
    line-height: 1;
    margin: 0;
}

.meta{
    color: grey;
    line-height: 0.9em;
    font-size: 0.9em;
}

</style>

<script>
let post = document.querySelector(".post_content");
let content = document.querySelector(".content");

function reverseContent(){
    let text = content.textContent;
    let newText = text.split("").reverse().join("");
    content.textContent = newText;
}

post.addEventListener("dblclick", reverseContent);

</script>

<?php