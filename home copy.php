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
    include 'navbar.php'
    ?>
    <img class="MainLogo" src="./static/css/Images/StylishYou_Logo_Main.png" alt="">
    <div class="BodyWrapper">

        <div class="Card">
            <div class="Card-Header">MALE PRODUCTS</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?gender=mens">
                    <li class="list-group-item" id="CardList">Filter <button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Find</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>

        <div class="Card">
            <div class="Card-Header">LADIES PRODUCTS</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?gender=ladies">
                    <li class="list-group-item" id="CardList">Filter <button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Find</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>
        <div class="Card">
            <div class="Card-Header">BOYS PRODUCTS</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?gender=boys">
                    <li class="list-group-item" id="CardList">Filter <button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Find</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>

        <div class="Card">
            <div class="Card-Header">GIRLS PRODUCTS</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?gender=girls">
                    <li class="list-group-item" id="CardList">Filter <button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Find</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>
        <div class="Card">
            <div class="Card-Header">BRAND TYPE</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?gender=mens">
                    <li class="list-group-item" id="CardList">Filter <button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Find</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>

        <div class="Card">
            <div class="Card-Header">PRODUCT TYPE</div>
            <ul class="list-group list-group-flush">
                <form method="POST" action="search.php?gender=ladies">
                    <li class="list-group-item" id="CardList">Filter <button type="submit" name="MaleFilter" id="MaleFilter" type="button" class="btn btn-outline-dark">Find</button></li>
                </form>
            </ul>
            <div class="SideImage">
                <img src="./static/css/Images/Layers.svg" alt="">
            </div>
        </div>

        
        </div>
    </div>


    <!-- Footer Image -->
    <img class="fix" src="./static/css/Images/BottomWave.svg" alt="">


</body>

</html>