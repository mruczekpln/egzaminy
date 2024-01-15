<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Hurtownia</title>

    <link rel="stylesheet" href="styl1.css" />
  </head>
  <body>
    <section id="logo">
      <img src="komputer.png" alt="hurtownia komputerowa" />
    </section>
    <section id="list">
      <ul>
        <li>
          Sprzęt
          <ol>
            <li>Procesory</li>
            <li>Pamięci RAM</li>
            <li>Monitory</li>
            <li>Obudowy</li>
            <li>Karty Graficzne</li>
            <li>Dyski twarde</li>
          </ol>
        </li>
        <li>Oprogramowanie</li>
      </ul>
    </section>
    <section id="form">
      <h2>Hurtownia komputerowa</h2>
      <form method="post">
        Wybierz kategorię sprzętu <br />
        <input type="number" name="category" id="category" />
        <button type="submit">SPRAWDŹ</button>
      </form>
    </section>
    <main>
      <h1>Podzespoły we wskazanej kategorii</h1>

      <?php
      $conn = mysqli_connect('localhost', 'root', '', 'hurtownia');

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $category = $_POST['category'];

        $result = mysqli_query($conn, "
        SELECT podzespoly.nazwa, podzespoly.opis, podzespoly.cena
        FROM podzespoly
        WHERE podzespoly.typy_id = $category;
        ");

        while ($row = mysqli_fetch_array($result)) {
          echo "<p>$row[0] $row[1] CENA: $row[2]</p>";
        }
      } else {
        echo 'Wybierz poprawną kategorię sprzetu';
      }

      mysqli_close($conn);
      ?>
    </main>
    <footer>
      <h3>
        Hurtownia działa od poniedziałku do soboty w godzinach
        7<sup>00</sup>-16<sup>00</sup>
      </h3>
      <a href="mailto:bok@hurtownia.pl">Napisz do nas</a>
      Partnerzy:
      <a href="http://intel.pl">Intel</a><a href="http://amd.pl">AMD</a>
      <p>Stronę wykonał: Biskup jebie gówno</p>
    </footer>
  </body>
</html>
