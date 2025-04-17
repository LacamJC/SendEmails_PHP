<?php
session_start();

if (isset($_SESSION['array'])) {
} else {
    $_SESSION['array'] = [];
}


?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <form class="mx-auto w-50 my-5" method="POST" action="./src/services/adicionar_destinatario.php">
        <div class="mb-3">
            <label for="destinatario" class="form-label">Adicionar destinatario</label>
            <input type="email" class="form-control" id="destinatario" name="destinatario">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

    <main class="container">
        <h3>Emails que irão receber a mensagem</h3>
        <ul class="list-group">
            <?php
            if (isset($_SESSION['array'])) {
                foreach ($_SESSION['array'] as $email) {
                    echo "<li class='list-group-item'>{$email}</li>";
                }
            }

            ?>
        </ul>
    </main>

    <form class="mx-auto w-50 my-5" method="POST" action="./src/services/enviar_email.php">
        <div class="mb-3">
            <label for="destinatario" class="form-label">Assunto</label>
            <input type="text" class="form-control" id="assunto" name="assunto">
        </div>
        <div class="mb-3">
            <label for="destinatario" class="form-label">Corpo da mensagem</label>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Corpo da mensagem" id="corpo" name="corpo"></textarea>
                <label for="floatingTextarea">Comments</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>


    <?php
    if (isset($_SESSION['success'])) {
        echo "<p class='alert alert-success text-center mx-auto w-75 my-5'>{$_SESSION['success']}</p>";

        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo "<p class='alert alert-danger mx-auto w-75 my-5 text-center'>{$_SESSION['error']}</p>";

        unset($_SESSION['error']);
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>