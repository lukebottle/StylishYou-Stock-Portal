<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- My CSS -->
    <link rel='stylesheet' type='text/css' href='./static/css/styles.css'>
    <!-- My Script -->
    <script src="./static/javascript/script.js" defer></script>
    <!-- BootStrap CS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body data-theme="theme">
    <?php
    include 'navbar.php';


    if ($_GET['Brand']) {
        $GetRequest = $_GET['Brand'];

        require "db_connect.php";

        //prepare the sql query 
        $Gender = "SELECT Gender FROM OurProducts WHERE Brand='" . $GetRequest . "'";
        $Products = "SELECT ProductType FROM OurProducts WHERE Brand='" . $GetRequest . "'";
        $Sizes = "SELECT Sizes FROM OurProducts WHERE Brand='" . $GetRequest . "'";
        $Colour = "SELECT Colour FROM OurProducts WHERE Brand='" . $GetRequest . "'";
        $Brand = "SELECT Brand FROM OurProducts WHERE Brand='" . $GetRequest . "'";

        $GenderResults = odbc_exec($connect, $Gender);
        $ProductResults = odbc_exec($connect, $Products);
        $SizesResults = odbc_exec($connect, $Sizes);
        $ColourResults = odbc_exec($connect, $Colour);
        $BrandResults = odbc_exec($connect, $Brand);

        //Sets search page to be brand search (not the best method of handling this)
        $BrandSearch = '1';
    } else if ($_GET['Gender']) {
        //get url parameter. 
        $GetRequest = $_GET['Gender'];

        require "db_connect.php";

        //prepare the sql query 
        $Products = "SELECT ProductType FROM OurProducts WHERE Gender='" . $GetRequest . "'";
        $Sizes = "SELECT Sizes FROM OurProducts WHERE Gender='" . $GetRequest . "'";
        $Colour = "SELECT Colour FROM OurProducts WHERE Gender='" . $GetRequest . "'";
        $Brand = "SELECT Brand FROM OurProducts WHERE Gender='" . $GetRequest . "'";

        $ProductResults = odbc_exec($connect, $Products);
        $SizesResults = odbc_exec($connect, $Sizes);
        $ColourResults = odbc_exec($connect, $Colour);
        $BrandResults = odbc_exec($connect, $Brand);
    } else if ($_GET['Product']) {
        //get url parameter. 
        $GetRequest = $_GET['Product'];

        require "db_connect.php";

        //prepare the sql query 
        $Gender = "SELECT Gender FROM OurProducts WHERE ProductType='" . $GetRequest . "'";
        $Products = "SELECT ProductType FROM OurProducts WHERE ProductType='" . $GetRequest . "'";
        $Sizes = "SELECT Sizes FROM OurProducts WHERE ProductType='" . $GetRequest . "'";
        $Colour = "SELECT Colour FROM OurProducts WHERE ProductType='" . $GetRequest . "'";
        $Brand = "SELECT Brand FROM OurProducts WHERE ProductType='" . $GetRequest . "'";

        $GenderResults = odbc_exec($connect, $Gender);
        $ProductResults = odbc_exec($connect, $Products);
        $SizesResults = odbc_exec($connect, $Sizes);
        $ColourResults = odbc_exec($connect, $Colour);
        $BrandResults = odbc_exec($connect, $Brand);
        $ProductSearch = '1';
    }

    ?>

    </head>

    <!-- Refractor results that are returned -->
    <div class="BodyWrapperSearch">

        <div class="SearchCard">
            <img class="SearchImg" id="SearchImg" src="static/css/Images/StylishYou_Logo_Green.png" alt="">
            <div class="form-group">

                <!-- Create post request to send parameters to the search screen. -->
                <form action="results.php" method="get">
                    <label for="exampleFormControlSelect1" id="SearchHeader"></label>
                    <?php

                    //Creates brand options. 
                    if ($_GET['Brand'] || $_GET['Product']) {
                        echo "<div id='GenderDropDown'>
                         <p>Gender</p>
                         <select name='Brand' class='form-control' id='exampleFormControlSelect1'>";

                        while ($RowGender = odbc_fetch_array($GenderResults))
                            echo "<option class='FormOptions' value='" . $RowGender["Gender"] . "'>" . $RowGender["Gender"] . "<br></options>";
                        echo "</select>
                    </div>";
                    }
                    if ($_GET['Product']) {
                        echo '
                        <p>Product Type</p>
                        <select name="Brand" class="form-control" id="exampleFormControlSelect1">';

                        while ($RowBrand = odbc_fetch_array($BrandResults))
                            echo "<option class='FormOptions' value='" . $RowBrand["Brand"] . "'>" . $RowBrand["Brand"] . "<br></options>";
                        echo '</select>
                    ';
                    };
                    ?>
                    <div id="ProductBody">
                        <p id="HeaderOne">Product Type</p>
                        <select name="Product" class="form-control" id="exampleFormControlSelect1">
                            <?php
                            while ($RowProduct = odbc_fetch_array($ProductResults))
                                echo "<option class='FormOptions' value='" . $RowProduct["ProductType"] . "'>" . $RowProduct["ProductType"] . "<br></options>";
                            ?>
                        </select>
                    </div>
                    <p>Size</p>
                    <select name="Size" class="form-control" id="exampleFormControlSelect1">
                        <?php
                        while ($RowSize = odbc_fetch_array($SizesResults))
                            echo "<option class='FormOptions' value=" . $RowSize['Sizes'] . ">" . $RowSize['Sizes'] . "<br></options>";
                        ?>
                    </select>
                    <p>Colour</p>
                    <select name="Colour" class="form-control" id="exampleFormControlSelect1">
                        <?php
                        while ($RowColour = odbc_fetch_array($ColourResults))
                            echo "<option class='FormOptions' value=" . $RowColour['Colour'] . ">" . $RowColour['Colour'] . "<br></options>";
                        ?>
                    </select>
                    <h2>Price Range</h2>
                    <p>Use slider or enter min and max price</p>
                    </header>
                    <div class="price-input">
                        <div class="field">
                            <span>Min</span>
                            <input type="number" class="input-min" value="2500">
                        </div>
                        <div class="separator">-</div>
                        <div class="field">
                            <span>Max</span>
                            <input type="number" class="input-max" value="3800">
                        </div>
                    </div>
                    <div class="slider">
                        <div id="progress" class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-min" min="0" max="10000" value="2500" step="10">
                        <input type="range" class="range-max" min="0" max="5000" value="3800" step="10">
                    </div>
                    <!-- Body that will be disabled if user requests brand search -->
                    <div id="BrandBody">
                        <p>Brand</p>
                        <select name="Brand" class="form-control" id="exampleFormControlSelect1">
                            <?php
                            while ($RowBrand = odbc_fetch_array($BrandResults))
                                echo "<option class='FormOptions' value='" . $RowBrand["Brand"] . "'>" . $RowBrand["Brand"] . "<br></options>";
                            ?>
                        </select>
                    </div>
                    <button type="submit" id="btnPageColour" class="btn btn-primary btn-lg btn-block">See all results</button><br>
                </form>
                <a href="home.php"><button type="button" class="btn btn-secondary btn-lg btn-block">Home</button></a>
            </div>

        </div>

    </div>
    <!-- Footer Image -->
    <img class="fix" src="./static/css/Images/BottomWave.svg" alt="">
    <?php
    echo "<p class='SQLSyntaxWhite'>$Products <br> $Sizes <br> $Colour <br> $Brand</p>";
    ?>
    <script type="text/javascript">
        var GenderSwitch = "<?php echo $GetRequest; ?>";

        var BrandCheck = "<?php echo $BrandSearch ?>";
        var ProductCheck = "<?php echo $ProductSearch ?>";

        if (GenderSwitch == "Mens") {
            document.querySelector('.SearchImg').src = "static/css/Images/StylishYou_Logo_Green.png";
            document.getElementById('SearchHeader').innerText = "MENS PRODUCTS"
            let BtnPrimary = document.getElementById('btnPageColour');

            BtnPrimary.style.backgroundColor = "#2eb4c6";
            BtnPrimary.style.border = "#2eb4c6";
        }
        if (GenderSwitch == "Ladies") {
            document.querySelector('.SearchImg').src = "static/css/Images/StylishYou_Logo_Red.png";
            document.getElementById('SearchHeader').innerText = "LADIES PRODUCTS"
            let BtnPrimary = document.getElementById('btnPageColour');
            BtnPrimary.style.backgroundColor = "#e71d3d";
            BtnPrimary.style.border = "#e71d3d";
        }
        if (GenderSwitch == "Boys") {
            document.querySelector('.SearchImg').src = "static/css/Images/StylishYou_Logo_Orange.png";
            document.getElementById('SearchHeader').innerText = "BOYS PRODUCTS"
            let BtnPrimary = document.getElementById('btnPageColour');

            BtnPrimary.style.backgroundColor = "#ff9f1c";
            BtnPrimary.style.border = "#ff9f1c";
        }
        if (GenderSwitch == "Girls") {
            document.querySelector('.SearchImg').src = "static/css/Images/StylishYou_Logo_Orange.png";
            document.getElementById('SearchHeader').innerText = "GIRLS PRODUCTS"
            let BtnPrimary = document.getElementById('btnPageColour');

            BtnPrimary.style.backgroundColor = "#ff9f1c";
            BtnPrimary.style.border = "#ff9f1c";
        }
        if (BrandCheck == "1") {
            document.querySelector('.SearchImg').src = "static/css/Images/StylishYou_Logo_Main.png";
            document.querySelector('.SearchImg').style.paddingLeft = '0px';
            let BtnPrimary = document.getElementById('btnPageColour');
            let BrandHeader = document.getElementById('SearchHeader')
            let DisableBrand = document.getElementById('BrandBody');

            BrandHeader.innerText = '<?php echo $GetRequest ?>'

            DisableBrand.style.display = 'none';
            BtnPrimary.style.backgroundColor = "#011627";
            BtnPrimary.style.border = "#011627";
        }
        if (ProductCheck == "1") {

            document.querySelector('.SearchImg').src = "static/css/Images/StylishYou_Logo_Main.png";
            let BtnPrimary = document.getElementById('btnPageColour');
            let BrandHeader = document.getElementById('SearchHeader')
            let DisableBrand = document.getElementById('BrandBody');
            let DisableProduct = document.getElementById('ProductBody');

            DisableProduct.style.display = 'none';
            DisableBrand.style.display = 'none';
            BtnPrimary.style.backgroundColor = "#011627";
            BtnPrimary.style.border = "#011627";
        } else {

        }
    </script>


    </form>
    </div>
    </div>
    </div>
</body>

</html>