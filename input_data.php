<?php
    $length = $_POST['length'];
    $sepal_length = $_POST['sepal_length'];
    $sepal_width = $_POST['sepal_width'];
    $petal_length = $_POST['petal_length'];
    $petal_width = $_POST['petal_width'];
    $species = $_POST['species'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="jumbotron text-center">
        <h1>Input Data</h1>
    </div>

    <div class="container">
        <form class="form-horizontal" action="learning.php" method="post">
        <?php for ($i = 0; $i < $length; $i++) : ?>
                <input type="hidden" name="sepal_length[]" value=<?php echo $sepal_length[$i]; ?>>
                <input type="hidden" name="sepal_width[]" value=<?php echo $sepal_width[$i]; ?>>
                <input type="hidden" name="petal_length[]" value=<?php echo $petal_length[$i]; ?>>
                <input type="hidden" name="petal_width[]" value=<?php echo $petal_width[$i]; ?>>
                <input type="hidden" name="species[]" value=<?php echo $species[$i]; ?>>
            <?php endfor; ?>

            <input type="hidden" name="length" value=<?php echo $length; ?>>
            <div class="form-group">
                <label class="control-label col-sm-4" for="x1">Masukkan Tinggi Kelopak Bunga</label>
                <div class="col-sm-6">
                    <input class="form-control" type="number" name="x1" step=any>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="x2">Masukkan Lebar Kelopak Bunga</label>
                <div class="col-sm-6">
                    <input class="form-control" type="number" name="x2" step=any>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="x3">Masukkan Tinggi Daun Bunga</label>
                <div class="col-sm-6">
                    <input class="form-control" type="number" name="x3" step=any>
                </div>
            </div>
            <div class="form-group margin-bottom">
                <label class="control-label col-sm-4" for="x4">Masukkan Lebar Daun Bunga</label>
                <div class="col-sm-6">
                    <input class="form-control" type="number" name="x4" step=any>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-6">
                    <button type="submit" class="btn btn-primary">Lakukan Proses Learning</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>