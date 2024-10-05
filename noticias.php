<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Faro - Noticias</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>Artículos Recientes</h2>
    <div class="row">
        
        <?php foreach ($noticias as $noticia): ?>
            <div class="col-md-4 article-card">
                <div class="card">
                    <img public="imagenes" class="card-img-top" alt="<?php echo htmlspecialchars($noticia->getTitulo()); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($noticia->getTitulo()); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($noticia->getContenido()); ?></p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div> <!-- Fin de row -->
</div> <!-- Fin de container -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>