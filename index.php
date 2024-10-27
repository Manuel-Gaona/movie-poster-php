<?php 

    const API_URL = "https://whenisthenextmcufilm.com/api";
    #inicializar una nueva sesion de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    // Inducar que queremos recibir el resultado de la peticion y no imprimirlo
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /** Ejecutar la peticion y guardamos el resultado */
    $result = curl_exec($ch);

    // una alternativa seria usar file_get_contents
    // $result = file_get_contents(API_URL); // si solo quieres obtener el contenido de la url
    $data = json_decode($result, true);

    curl_close($ch);
?>

<head>
    <meta charset="utf-8"/>
    <title>Marvel</title>
    <meta name="description" content="La proxima pelicula de Marvel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
    
</head>

<main>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="300"  alt="Poster de <?= $data["title"] ?>">
    </section>

    <hgroup>
        <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?> dias</h2>
        <p>Fecha de estreno: <?= $data["release_date"]; ?></p>
        <p>La siguiente pelicula es:  <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>

<style>
    :root{
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img{
        margin: 0 auto;
        border-radius: 16px;
    }
</style>