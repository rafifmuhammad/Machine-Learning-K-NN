<?php
    $length = $_POST['length'];
    $sepal_length = $_POST['sepal_length'];
    $sepal_width = $_POST['sepal_width'];
    $petal_length = $_POST['petal_length'];
    $petal_width = $_POST['petal_width'];
    $species = $_POST['species'];

    $x1 = $_POST['x1'];
    $x2 = $_POST['x2'];
    $x3 = $_POST['x3'];
    $x4 = $_POST['x4'];

    function euclideanDistance($x1, $x2, $x3, $x4, $sepal_length, $sepal_width, $petal_length, $petal_width, $length) {
        $distance_result = 0;
        $distance = [];

        for ($i = 0; $i < $length; $i++) {
            $distance_result = sqrt(pow(abs($sepal_length[$i] - $x1), 2) + pow(abs($sepal_width[$i] - $x2), 2) + pow(abs($petal_length[$i] - $x3), 2) + pow(abs($petal_width[$i] - $x4), 2));
            array_push($distance, number_format($distance_result, 2));
        }

        return $distance;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Learning</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="jumbotron text-center">
        <h1>Proses Learning</h1>
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
                <?php
                    $distance = euclideanDistance($x1, $x2, $x3, $x4, $sepal_length, $sepal_width, $petal_length, $petal_width, $length);
                ?>
                
                <?php for ($i = 0; $i < $length; $i++) : ?>
                    <tr>
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
        <form action="pengurutan.php" method="post">
            <?php for ($i = 0; $i < $length; $i++) : ?>
                <input type="hidden" name="sepal_length[]" value=<?php echo $sepal_length[$i]; ?>>
                <input type="hidden" name="sepal_width[]" value=<?php echo $sepal_width[$i]; ?>>
                <input type="hidden" name="petal_length[]" value=<?php echo $petal_length[$i]; ?>>
                <input type="hidden" name="petal_width[]" value=<?php echo $petal_width[$i]; ?>>
                <input type="hidden" name="species[]" value=<?php echo $species[$i]; ?>>
                <input type="hidden" name="distance[]" value=<?php echo $distance[$i]; ?>>
            <?php endfor; ?>

            <input type="hidden" name="length" value=<?php echo $length; ?>>
            <button type="submit" class="btn btn-primary">Urutkan Jarak Data</button>
        </form>
    </div>
</body>
</html>