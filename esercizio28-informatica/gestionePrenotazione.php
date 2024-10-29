<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <?php
        $dataPrenotazione = date("Y-m-d H:i:s");
        if (!(isset($_POST["ordine"]))) {
          echo "<h1>non è stata selezionata nessuna portata</h1>";
          echo "<a href='prenotazione.html'>effettua nuovamente la prenotazione</a>"; 
          exit();
        } elseif (count($_POST["ordine"]) == 1 && $_POST["ordine"][0] == "antipasto"){
          echo "<h1>non è possibile ordinare solo antipasto</h1>";
          echo "<p>$dataPrenotazione</p>";
          echo "<a href='prenotazione.html'>effettua nuovamente la prenotazione</a>";
          exit();
        }
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $tavolo = $_POST["tavolo"];
        $orario = $_POST["orario"];
        $ordine = (isset($_POST["ordine"]) ? $_POST["ordine"] : "nessun ordine") ;
        $note = $_POST["note"];
        $parcheggio = $_POST["parcheggio"];
        $camerieri = array("tommaso", "niccolo", "pietro", "mattia", "giuseppe");
        $cameriere = $camerieri[rand(0,4)];
        $antipastoPrezzo = 5;
        $primoPrezzo = 6; 
        $secondoPrezzo = 7;
        $antipasto = false;
        $primo = false; 
        $secondo = false;
        $prezzoTotale = 0;
        foreach ($ordine as $ord){
          switch ($ord){
            case "antipasto":
              $prezzoTotale += $antipastoPrezzo;
              $antipasto = true;
              break;
            case "primo":
              $prezzoTotale += $primoPrezzo;
              $primo = true;
              break;
            case "secondo":
              $prezzoTotale += $secondoPrezzo;
              $secondo = true;
              break;
          }
        }
        if ($primo && $secondo) {
          $prezzoTotale *= 0.9;
        }else if($primo && $secondo && $antipasto){
          $prezzoTotale *= 0.85;
        }
        if ($parcheggio == "parcheggio custodito") {
          $prezzoTotale += 5;
        }else if ($parcheggio == "parcheggio non custodito") {
          $prezzoTotale += 3;
        }
    ?>
    <table>
      <tr>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Tavolo</th>
        <th>Orario</th>
        <th>Ordine</th>
        <th>Note</th>
        <th>Parcheggio</th>
        <th>Data prenotazione</th>
        <th>Cameriere</th>
        <th>Prezzo totale</th>
      </tr>
      <tr>
        <td><?php echo $nome;?></td>
        <td><?php echo $cognome;?></td>
        <td><?php echo $tavolo;?></td>
        <td><?php echo $orario;?></td>
        <td><?php foreach($ordine as $ord){
          echo "$ord ";
        }?></td>
        <td><?php echo $note;?></td>
        <td><?php echo $parcheggio;?></td>
        <td><?php echo $dataPrenotazione;?></td>
        <td><?php echo $cameriere;?></td>
        <td><?php echo $prezzoTotale;?></td>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>