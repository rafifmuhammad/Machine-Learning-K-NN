<?php
    $api_url = 'http://localhost:4000/api/iris';

    $json_data = file_get_contents($api_url);

    $iris_data = json_decode($json_data);

    $sepal_length = [];
    $sepal_width = [];
    $petal_length = [];
    $petal_width = [];
    $species = [];

    for ($i = 0; $i < count($iris_data); $i++) {
        array_push($sepal_length, $iris_data[$i]->SepalLengthCm);
        array_push($sepal_width, $iris_data[$i]->SepalWidthCm);
        array_push($petal_length, $iris_data[$i]->PetalLengthCm);
        array_push($petal_width, $iris_data[$i]->PetalWidthCm);
        array_push($species, $iris_data[$i]->Species);
    }

    $length = count($sepal_length);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Latih</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="jumbotron text-center">        
        <h1>Data Latih</h1>
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
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < $length; $i++) : ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $sepal_length[$i]; ?></td>
                        <td><?php echo $sepal_width[$i]; ?></td>
                        <td><?php echo $petal_length[$i]; ?></td>
                        <td><?php echo $petal_width[$i]; ?></td>
                        <td><?php echo $species[$i]; ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
 
    <div class="container">
        <form action="input_data.php" method="post">
            <?php for ($i = 0; $i < $length; $i++) : ?>
                <input type="hidden" name="sepal_length[]" value=<?php echo $sepal_length[$i]; ?>>
                <input type="hidden" name="sepal_width[]" value=<?php echo $sepal_width[$i]; ?>>
                <input type="hidden" name="petal_length[]" value=<?php echo $petal_length[$i]; ?>>
                <input type="hidden" name="petal_width[]" value=<?php echo $petal_width[$i]; ?>>
                <input type="hidden" name="species[]" value=<?php echo $species[$i]; ?>>
            <?php endfor; ?>

            <input type="hidden" name="length" value=<?php echo $length; ?>>
            <button type="submit" class="btn btn-primary">Input Data</button>
        </form>
    </div>
</body>
</html>