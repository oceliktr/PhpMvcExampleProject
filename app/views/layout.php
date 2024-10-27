<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Varsayılan Başlık' ?></title>
    <link rel="stylesheet" href="/mvc_example/public/css/style.css">
</head>
<body>
<header>
    <h1>Web Siteme Hoş Geldiniz</h1>
    <nav>
        <ul>
            <li><a href="/">Ana Sayfa</a></li>
            <li><a href="/User/create">Yeni Kullanıcı</a></li>
            <li><a href="/Site/about">Hakkımızda</a> </li>
            <li><a href="/Site/contact">İletişim</a></li>
        </ul>
    </nav>
</header>

<main>
    <?php if (isset($content)) echo $content; ?>
</main>

<footer>
    <p>Telif Hakkı © 2024, Tüm Hakları Saklıdır.</p>
</footer>
</body>
</html>