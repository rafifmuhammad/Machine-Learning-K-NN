<?php
    $length = $_POST['length'];
    $sepal_length = $_POST['sepal_length'];
    $sepal_width = $_POST['sepal_width'];
    $petal_length = $_POST['petal_length'];
    $petal_width = $_POST['petal_width'];
    $species = $_POST['species'];

    $distance = $_POST['distance'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Pengurutan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="jumbotron text-center">
        <h1>Proses Pengurutan</h1>
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
                for ($i = 0; $i < $length-1; $i++) {
                    for ($j = 0; $j < $length-1-$i; $j++) {
                        if ($distance[$j] > $distance[$j+1]) {
                            [$distance[$j], $distance[$j+1]] = [$distance[$j+1], $distance[$j]];
                            [$sepal_length[$j], $sepal_length[$j+1]] = [$sepal_length[$j+1], $sepal_length[$j]];
                            [$sepal_width[$j], $sepal_width[$j+1]] = [$sepal_width[$j+1], $sepal_width[$j]];
                            [$petal_length[$j], $petal_length[$j+1]] = [$petal_length[$j+1], $petal_length[$j]];
                            [$petal_width[$j], $petal_width[$j+1]] = [$petal_width[$j+1], $petal_width[$j]];
                            [$species[$j], $species[$j+1]] = [$species[$j+1], $species[$j]];
                        }
                    }
                }

                for ($i = 0; $i < $length; $i++) : ?>
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
        <form action="testing.php" method="post">
            <?php for ($i = 0; $i < $length; $i++) : ?>
                <input type="hidden" name="sepal_length[]" value=<?php echo $sepal_length[$i]; ?>>
                <input type="hidden" name="sepal_width[]" value=<?php echo $sepal_width[$i]; ?>>
                <input type="hidden" name="petal_length[]" value=<?php echo $petal_length[$i]; ?>>
                <input type="hidden" name="petal_width[]" value=<?php echo $petal_width[$i]; ?>>
                <input type="hidden" name="species[]" value=<?php echo $species[$i]; ?>>
                <input type="hidden" name="distance[]" value=<?php echo $distance[$i]; ?>>
            <?php endfor; ?>

            <input type="hidden" name="length" value=<?php echo $length; ?>>
            <button type="submit" class="btn btn-primary">Lakukan Proses Testing</button>
        </form>
    </div>
</body>
</html>