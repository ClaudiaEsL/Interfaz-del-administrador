<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!--CSS Boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <?php 
        if(!empty($_COOKIE['_cookietema'])) $style = $_COOKIE['_cookietema'];
        if(empty($_COOKIE['_cookietema'])) $style = "menu";
        if(!empty($_COOKIE['_cookietema'])) $form = $_COOKIE['_cookietema'];
        if(empty($_COOKIE['_cookietema'])) $fomr = "formularios";
        if(!empty($_COOKIE['_cookietema'])) $tables = $_COOKIE['_cookietema'];
        if(empty($_COOKIE['_cookietema'])) $tables = "tables";
	?>
	<link rel="stylesheet" href="css/styles/<?php echo $style ?>.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/styles/<?php echo $form ?>.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/styles/<?php echo $tables ?>.css" type="text/css" media="all">
</head>