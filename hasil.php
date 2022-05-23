<?php
    $k = $_POST['k'];
    $length = $_POST['length'];
    $sepal_length = $_POST['sepal_length'];
    $sepal_width = $_POST['sepal_width'];
    $petal_length = $_POST['petal_length'];
    $petal_width = $_POST['petal_width'];
    $species = $_POST['species'];

    $distance = $_POST['distance'];

    function hasilKlasifikasi($k, $species, $distance) {
        $result = '';
        $versicolor = 0;
        $virginica = 0;
        $setosa = 0;

        $distanceVirginica = 0;
        $distanceVersicolor = 0;
        $distanceSetosa = 0;

        for ($i = 0; $i < $k; $i++) {
            if ($species[$i] == 'Iris-virginica') {
                if ($distanceVirginica < $distance[$i]) {
                    $distanceVirginica = $distance[$i];
                }
                $virginica += 1;
            } else if ($species[$i] == 'Iris-versicolor') {
                if ($distanceVersicolor < $distance[$i]) {
                    $distanceVersicolor = $distance[$i];
                }
                $versicolor += 1;
            } else {
                if ($distanceSetosa < $distance[$i]) {
                    $distanceSetosa = $distance[$i];
                }
                $setosa += 1;
            }
        }

        if ($virginica > $versicolor && $virginica > $setosa) {
            $result = 'Iris virginica';
        } else if ($versicolor > $virginica && $versicolor > $setosa) {
            $result = 'Iris versicolor';
        } else if ($setosa > $versicolor && $setosa > $virginica) {
            $result = 'Iris setosa';
        } else {
            if ($setosa == $virginica || $setosa == $versicolor && $distanceSetosa < $distanceVirginica && $distanceSetosa < $distanceVersicolor) {
                $result = 'Iris setosa';
            } else if ($versicolor == $virginica || $versicolor == $setosa && $distanceVersicolor < $distanceVirginica && $distanceVersicolor < $distanceSetosa) {
                $result = 'Iris versicolor';
            } else if ($virginica == $versicolor || $virginica == $setosa && $distanceVirginica < $distanceVersicolor && $distanceVirginica < $distanceSetosa) {
                $result = 'Iris virginica';
            } 
        }

        return $result;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Testing</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="jumbotron text-center">
        <h1>Hasil Testing</h1>
    </div>

    <div class="container scroll margin-bottom">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Sepal Length</th>
                    <th class="text-center">Sepal Width</th>
                    <th class="text-center">Petal Length</th>
                    <th class="text-center">Petal Width</th>
                    <th class="text-center">Species</th>
                    <th class="text-center">Euclidean Distance</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < $length; $i++) : ?>
                    <?php
                        $typeClass = ($i < $k) ? "info" : "";
                    ?>
                    <tr class="<?php echo $typeClass; ?>">
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $sepal_length[$i]; ?></td>
                        <td><?php echo $sepal_width[$i]; ?></td>
                        <td><?php echo $petal_length[$i]; ?></td>
                        <td><?php echo $petal_width[$i]; ?></td>
                        <td><?php echo $species[$i]; ?></td>
                        <td><?php echo $distance[$i]; ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <h2>Hasil Testing</h2>
        <p>Jadi, dari hasil data uji yang di dapat maka hasil klasifikasi yang terbanyak mayoritasnya ialah
            <strong><?php echo hasilKlasifikasi($k, $species, $distance); ?></strong>
        </p>
    </div>
 
    <div class="container margin-bottom">
        <form action="index.php" method="post">
            <button type="submit" class="btn btn-primary">Kembali ke halaman awal</button>
        </form>
    </div>
</body>
</html>