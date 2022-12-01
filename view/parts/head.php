<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $PAGE['SEO_TITLE'] ?></title>
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="<?= $PAGE['SEO_DESC'] ?>">
    <meta name="keywords" content="<?= $PAGE['SEO_KEY'] ?>">
    <link rel="shortcut icon" href="img/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" sizes="16x16" href="img/favicons/favicon-16x16.png" type="image/png">
    <link rel="icon" sizes="32x32" href="img/favicons/favicon-32x32.png" type="image/png">
    <link rel="apple-touch-icon-precomposed" href="img/favicons/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="img/favicons/apple-touch-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="1024x1024" href="img/favicons/apple-touch-icon-1024x1024.png">
    <link rel="preload" href="/fonts/museo/subset-MuseoSansCyrl-900.woff2" as="font" crossorigin>
    <link rel="preload" href="/fonts/museo/subset-MuseoSansCyrl-700.woff2" as="font" crossorigin>
    <link rel="preload" href="/fonts/museo/subset-MuseoSansCyrl-300.woff2" as="font" crossorigin>
    <link rel="prefetch" href="/img/sprites/sprite.svg" as="image" crossorigin>

    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />


    <style>
        @font-face {
            font-family: 'Museo Sans Cyrl';
            src: url("/fonts/museo/subset-MuseoSansCyrl-300.woff2") format("woff2"), url("/fonts/museo/subset-MuseoSansCyrl-300.woff") format("woff");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Museo Sans Cyrl';
            src: url("/fonts/museo/subset-MuseoSansCyrl-500.woff2") format("woff2"), url("/fonts/museo/subset-MuseoSansCyrl-500.woff") format("woff");
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Museo Sans Cyrl';
            src: url("/fonts/museo/subset-MuseoSansCyrl-700.woff2") format("woff2"), url("/fonts/museo/subset-MuseoSansCyrl-700.woff") format("woff");
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Museo Sans Cyrl';
            src: url("/fonts/museo/subset-MuseoSansCyrl-700.woff2") format("woff2"), url("/fonts/museo/subset-MuseoSansCyrl-700.woff") format("woff");
            font-weight: 600;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Museo Sans Cyrl';
            src: url("/fonts/museo/subset-MuseoSansCyrl-900.woff2") format("woff2"), url("/fonts/museo/subset-MuseoSansCyrl-900.woff") format("woff");
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "ProximaBlack";
            src: url("/css/fonts/ProximaNova-Black.eot");
            src: url("/css/fonts/ProximaNova-Black.eot?#iefix")format("embedded-opentype"), url("/fonts/museo/ProximaNova-Black.woff") format("woff");
            font-style: normal;
            font-weight: normal;
        }
    </style>


    <? foreach ($PAGE['STYLES'] as $link) : ?>
        <link rel="stylesheet" href="<?= $link ?>">
    <? endforeach; ?>

</head>

<body>