<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/assets/css/welcome.css">
        <title>Acquisition et stockage des données</title>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <img src="/assets/images/logo-3.jpg" alt="logo thermcross">
                <h1 class="home-title"><span>Acquisition et stockage des données</span></h1>
                
                <form action="/loadCsv/loadCsv" method="post" enctype="multipart/form-data" class="box card">
                <img src="/assets/images/upload.png" alt="icon upload">
                    <div>Sélectionner un fichier <b>CSV</b></div>
                    <input type="file" name="file" id="file">
                    <input type="submit" value="Télécharger" name="submit" class="button">
                </form>
                <a href="/data/index" class="arrow"><h1>Afficher les données</h1></a>
            </div>
        </div>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </body>
</html>