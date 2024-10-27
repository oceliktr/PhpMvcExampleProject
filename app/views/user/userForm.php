
<h1>Yeni Kullanıcı Ekle</h1>

    <form action="/User/store" method="POST">
        <label for="name">İsim:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="text">Şifre:</label>
        <input type="text" name="password" id="password" required><br><br>
        <label for="text">Role:</label>
        <input type="number" name="role" id="role" required><br><br>
        <button type="submit">Kaydet</button>
    </form>
