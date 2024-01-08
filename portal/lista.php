<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Lista przyjaciol</title>

    <link rel="stylesheet" href="styl.css" />
  </head>
  <body>
    <header><h1>Portal Spolecznosciowy - moje konto</h1></header>

    <main>
      <h2>Moje zainteresowania</h2>
      <ul>
        <li>muzyka</li>
        <li>film</li>
        <li>komputery</li>
      </ul>

      <h2>Moi znajomi</h2>

      <?php
      $conn = mysqli_connect('localhost', 'root', '', 'portal');

      $query = "
      SELECT osoby.imie, osoby.nazwisko, osoby.opis, osoby.zdjecie
      FROM osoby
      WHERE osoby.hobby_id IN (1, 2, 6);
      ";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_array($result)) {
        $firstName = $row['imie'];
        $lastName = $row['nazwisko'];
        $desc = $row['opis'];
        $pic = $row['zdjecie'];

        echo "
        <img class='zdjecie' src='$pic' alt='przyjaciel' />
        <div class='opis'><h3>$firstName $lastName</h3><p>Ostatni wpis: $desc</p></div>
        <div class='linia'></div>
        ";
      }

      mysqli_close($conn);
      ?>
    </main>

    <footer id="left">Strone wykonal: biskup jebie gowno</footer>
    <footer id="right"><a href="mailto:ja@portal.pl">napisz do mnie</a></footer>
  </body>
</html>
