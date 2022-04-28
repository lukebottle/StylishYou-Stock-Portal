<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Home Screen</title>
    <!-- My CSS -->
    <link rel='stylesheet' type='text/css' href='./static/css/styles.css'>

    <!-- My Script -->
    <script src="./static/javascript/script.js" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body data-theme="theme">
    <?php
    include 'navbar.php';

    include 'db_connect.php';

    $BrandSQL = "SELECT Brand FROM OurProducts";
    $ProductSQL = "SELECT ProductType FROM OurProducts";

    
    $BrandResults = odbc_exec($connect, $BrandSQL);
    $ProductResults = odbc_exec($connect, $ProductSQL);
    ?>
    
    <div class="BodyWrapper">
    <img class="MainLogo" src="./static/css/Images/StylishYou_Logo_Main.png" alt="">
        <div class="Card">
            <div class="Card-Header">MALE PRODUCTS</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?Gender=Mens">
                    <li class="list-group-item" id="CardList"><button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Filter</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>

        <div class="Card">
            <div class="Card-Header">LADIES PRODUCTS</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?Gender=Ladies">
                    <li class="list-group-item" id="CardList"><button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Filter</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>
        <div class="Card">
            <div class="Card-Header">BOYS PRODUCTS</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?Gender=Boys">
                    <li class="list-group-item" id="CardList"><button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Filter</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>

        <div class="Card">
            <div class="Card-Header">GIRLS PRODUCTS</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?Gender=Girls">
                    <li class="list-group-item" id="CardList"><button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Filter</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>
        <div class="Card">
            <div class="Card-Header">BRAND TYPE</div>

            <form action="search.php" method="get">
                <select name="Brand" class="form-control" id="exampleFormControlSelect1">
                    <?php
                    while ($RowBrand = odbc_fetch_array($BrandResults))
                        echo "<option class='BrandOption' class='FormOptions' value='" . $RowBrand["Brand"] . "'>" . $RowBrand["Brand"] . "<br></options>";
                    ?>
                </select>
                <button type="submit" id="btnPageColour" class="btn btn-primary btn-lg btn-block">See all results</button><br>
            </form>


        </div>

        <div class="Card">
            <div class="Card-Header">PRODUCT TYPE</div>
            <form action="search.php" method="get">
                <select name="Product" class="form-control" id="exampleFormControlSelect1">
                    <?php
                    while ($RowProduct = odbc_fetch_array($ProductResults))
                        echo "<option class='BrandOption' class='FormOptions' value='" . $RowProduct["ProductType"] . "'>" . $RowProduct["ProductType"] . "<br></options>";
                    ?>
                </select>
                <button type="submit" id="btnPageColour" class="btn btn-primary btn-lg btn-block">See all results</button><br>
            </form>
        </div>


    </div>
    </div>


    <!-- Footer Image -->
    <img class="fix" src="./static/css/Images/BottomWave.svg" alt="">


</body>

</html>