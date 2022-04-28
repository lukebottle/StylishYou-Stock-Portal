<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- My CSS -->
    <link rel='stylesheet' type='text/css' href='./static/css/styles.css'>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <!-- My Script -->
    <script type="text/javascript" src="./static/javascript/table.js"></script>
</head>

<body data-theme="theme">
    <?php
    include 'navbar.php';

    // database connect script.
    require 'db_connect.php';

    //get url parameter. 
    $GetProduct = $_GET['Product'];
    $GetSize = $_GET['Size'];
    $GetColour = $_GET['Colour'];
    $GetBrand = $_GET['Brand'];

    //prepare the sql query 
    $Products = "SELECT ProductDescription, Brand, Quantity, Locations FROM OurProducts WHERE ProductType='" . $GetProduct . "' AND Sizes='" . $GetSize . "' AND Colour='" . $GetColour . "' AND Brand='" . $GetBrand . "' ";

    $ProductResults = odbc_exec($connect, $Products);
    ?>
    <div class="BodyWrapperSearch">

        <div class="ResultsCard">
            <table id="MyTable" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <td>Product Description</td>
                        <td>Brand</td>
                        <td>Qty</td>
                        <td>Available in Store</td>
                    </tr>
                </thead>
                <?php
                if (odbc_num_rows($ProductResults) == 0) {
                    echo '<h1 class="ValidationHeader">NOTHING MATCHES YOUR SEARCH</h1>';
                } else {
                    while ($row = odbc_fetch_array($ProductResults)) {
                        echo "<h1 class='ValidationHeader'> YOUR SEARCH RESULTS:</h1>";
                        echo 
                        '<tr>
                        <td>' . $row["ProductDescription"] . '</td>
                        <td>' . $row["Brand"] . '</td>
                        <td>' . $row["Quantity"] . '</td>
                        <td>' . $row["Locations"] . '</td>
                        </tr>
                        ';
                    }
                }
                ?>

            </table>
        </div>
        <div class="ButtonWrapper">
            <a href="search.php"><button class="btn btn-secondary ">Back</button></a>
            <a href="home.php"><button class="btn btn-secondary ">Home</button></a>
        </div>
    </div>

    </div>
    <!-- Footer Image -->
    <img class="fix" src="./static/css/Images/BottomWave.svg" alt="">
    <?php
    echo "<p class='SQLSyntaxBlack'> $Products</p>";
    ?>
    <script>
        QuickConsole = "<?php $GetColour ?>"

        console.log(QuickConsole);
    </script>
</body>

</html>