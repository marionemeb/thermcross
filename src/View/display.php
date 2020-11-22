<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, width=device-width,">
        <link rel="stylesheet" href="/assets/css/display.css">
        <link rel="stylesheet" href="/assets/css/dropdown.css">
        <title>Affichage des données</title>
    </head>
    <body>
        <div class="container">
            <h1>Acquisition et stockage des données</h1>
            <a href="/home/index"><h2>Importer de nouvelles données</h2></a>

            <!-- Display one row by date -->
            <?php foreach($dates as $date): ?>
            <?php 
                $sum = 0;
                foreach($datas as $data): 
                    if ($data['date_expedition'] === $date['date_expedition']){
                        $sum += $data['montant_ht_total'];
                    }
            ?>
            <?php endforeach; ?>

            <table class="table-fill dropdown">
                <thead data-toggle="dropdown" class="toggle">
                    <tr>
                        <th class="text-left" colspan="6"><?= $date['date_expedition'] ?></th>
                        <th class="text-right" colspan="1">Total: <?= $sum ?> EUR</th>
                        <th class="text-left" colspan="1"><i class="icon"></i></th>
                    </tr>
                </thead>
                <tbody class="table-hover dropdown-menu">
                    <!-- Columns titles -->
                    <tr>
                        <th class="text-left">id</th>
                        <th class="text-left">Raison sociale expéditeur</th>
                        <th class="text-left">Date expédition colis</th>
                        <th class="text-left">N° envoi</th>
                        <th class="text-left">Raison Sociale destinataire</th>
                        <th class="text-left">Votre référence</th>
                        <th class="text-left">Bon de transport</th>
                        <th class="text-left">Montant h.t. Total</th>
                    </tr>
                
                    <!-- one row by data -->
                    <?php foreach($datas as $data): ?>
                        <?php if(!empty($data) and $data['date_expedition'] === $date['date_expedition']): ?>
                        <tr>
                            <td class="text-left"><?= $data['id'] ?></td>
                            <td class="text-left"><?= $data['expediteur'] ?></td>
                            <td class="text-left"><?= $data['date_expedition'] ?></td>
                            <td class="text-left"><?= $data['numero_envoi'] ?></td>
                            <td class="text-left"><?= $data['destinataire'] ?></td>
                            <td class="text-left"><?= $data['reference'] ?></td>
                            <td class="text-left"><?= $data['bon_de_transport'] ?></td>
                            <td class="text-left"><?= $data['montant_ht_total'] ?></td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endforeach; ?>
        </div>
        <script src="/assets/js/display.js">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>