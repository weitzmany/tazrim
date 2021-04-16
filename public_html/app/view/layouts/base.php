<?
    $R->addCss("https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css");
    $R->addCss('base');
    $R->addJs("https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js");
    $R->addJS('base');
?>
<!doctype html>
<html lang="he">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <? foreach($R->getAssets('css') as $css): ?>
    <link href="<?= $css ?>" rel="stylesheet">
    <? endforeach; ?>

    <title>tazrim</title>

    <? foreach($R->getAssets('js') as $js): ?>
    <script src="<?= $js ?>"></script>
    <? endforeach; ?>

</head>
<body>
    <div class="container">
        <?= $R->suply('content'); ?>
    </div>
</body>
</html>