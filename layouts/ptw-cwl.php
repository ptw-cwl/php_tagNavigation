<!doctype html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <title><?= SITE_NAME ?></title>
    <link rel="icon" href="/assets/img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap5  -->
    <link rel="stylesheet" href="/assets/bootstrap-5.1.3/css/bootstrap.min.css">
    <!-- css -->
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>
    <ptw-cwl class="container-fluid">
        <?php
        include_once("includes/nav.php");
        include_once("includes/body.php");
        include_once("includes/footer.php");
        // foreach ($tags as $tag) {
        //     echo "Name: $tag <br>";
        // }

        // $tags = selectTag();
        // print_r($tags);
        ?>
    </ptw-cwl>

    <!-- Bootstrap5  -->
    <script src="/assets/bootstrap-5.1.3/js/bootstrap.min.js"></script>
    <!-- js -->
    <script src="/assets/js/script.js"></script>

</body>

</html>