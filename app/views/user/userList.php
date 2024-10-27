
<h1>Kullanıcı Listesi</h1>

    <ul>
        <?php foreach ($data['users'] as $user): ?>
            <li><a href="/User/Detail/<?= $user['id'] ?>"><?= $user['username'] ?> (<?= $user['password'] ?>)</a></li>
        <?php endforeach; ?>
    </ul>