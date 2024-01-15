<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Forum o psach</title>

    <link rel="stylesheet" href="styl4.css" />
  </head>
  <body>
    <header><h1>Forum wielbicieli psów</h1></header>

    <aside><img src="obraz.jpg" alt="foksterier" /></aside>

    <section id="right-top">
      <h2>Zapisz się</h2>
      <form method="post">
        <label for="login">login: </label>
        <input type="text" name="login" id="login" /> <br>

        <label for="password">hasło: </label>
        <input type="password" name="password" id="password" /> <br>

        <label for="repeat-password">powtorz hasło: </label>
        <input type="password" name="repeat-password" id="repeat-password" /> <br>

        <button type="submit">Zapisz</button>
      </form>

      <?php
      $conn = mysqli_connect('localhost', 'root', '', 'psy');

      if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['repeat-password'])) {
        $result = mysqli_query($conn, 'SELECT login FROM uzytkownicy;');

        $login = $_POST['login'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeat-password'];

        if ($password == $repeatPassword) {
          $accountWithThisLogin = false;
          while ($row = mysqli_fetch_array($result)) if ($row['login'] == $login) $accountWithThisLogin = true;
          
          if ($accountWithThisLogin == true) echo '<p>login występuje w bazie danych, konto nie zostało dodane</p>';
          else {
            $hashedPassword = sha1($password);
            mysqli_query($conn, "INSERT INTO uzytkownicy (login, haslo) VALUES ('$login', '$hashedPassword');");

            echo '<p>hasło zostało dodane</p>';
          }
        } else echo '<p>hasła nie są takie same, konto nie zostało dodane</p>';
      } else echo '<p>wypełnij wszystkie pola</p>';

      mysqli_close($conn);
      ?>
    </section>

    <section id="right-bottom">
      <h2>Zapraszmy wszystkich</h2>
      <ol>
        <li>właścicieli psów</li>
        <li>weterynarzy</li>
        <li>tych, co chcą kupić psa</li>
        <li>tych, co lubią psy</li>
      </ol>

      <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </section>

    <footer>Stronę wykonał: biskup jebie gówno</footer>
  </body>
</html>
