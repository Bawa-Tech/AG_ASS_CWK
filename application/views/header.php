<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>CWK2</title>
</head>

<body class="bg-secondary">
    <nav class="navbar bg-dark bg-body-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" style="color: white;"> <?php echo $title; ?> </span>
            <?php if (isset($previous_page_link)) : ?>
                <a href="<?php echo $previous_page_link; ?>"><span class="navbar-brand mb-0 h1" style="color: white; align-self: right;"><?php echo $previous_page_title; ?></span></a>
            <?php endif; ?>
        </div>
    </nav>

    <main>