<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="stylesheet" href="/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="/css/reset.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <header>
        <?php require(ROOT."/src/views/shared/_header.php") ?>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <?php require(ROOT."/src/views/shared/_footer.php") ?>
    </footer>
    
</body>
</html>