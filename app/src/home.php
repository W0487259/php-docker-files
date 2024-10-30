<?php
$activePage = 'home';
$pageName = 'Home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageName;?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include './sections/header.php' ?>
    <?php include './sections/nav.php' ?>
    <section>
        <article>
            <img src="https://picsum.photos/600/400" alt="Kitten">
            <p>Emmet command to get 4 paragraphs of Lorem Ipsum: (p>lorem25)*4</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero eaque fugit laborum nihil maiores molestias, enim porro nisi voluptates, impedit quas velit id? Rerum, nostrum?</p>
            <p>Quasi minus autem accusantium fugit earum optio quam! Quasi et ducimus hic incidunt suscipit accusamus soluta consequatur, nemo asperiores adipisci! Ab ut facilis cumque asperiores.</p>
            <p>Quam porro commodi, praesentium dolore illum aliquid, quo maiores neque eum harum, blanditiis perferendis. Iste in saepe quidem aliquid odit perferendis autem unde maiores velit.</p>
            <p>Repellat accusantium porro culpa dolor optio voluptatem! Ratione, non eum. Repellat optio tempore deleniti? Laboriosam quibusdam quos voluptas omnis saepe? Labore deleniti perferendis cum quam.</p>
        </article>
    </section>
    <?php include './sections/footer.php' ?>
</body>
</html>