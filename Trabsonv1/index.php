<?php
define("ROOT_PATH", dirname(__FILE__));
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 bg-danger" id="rank">

            </div>
            <div class="col-sm-4">
                <div class="container">
                    <?php
                    include_once ROOT_PATH . "/View/tabela.php";
                    ?>
                    <button onclick="envia()">clica ae</button>
                </div>
            </div>
            <div class="col-sm-4 bg-warning">
                <h4>alguma coisa aqui</h4>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src=" https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        new Sortable(example1, {
            animation: 150,
            ghostClass: 'bg-primary'
        });
        $("#rank").load("View/rank.php");

        function envia() {
            var test = document.querySelectorAll('ol');
            const data = test['0'].innerText;

            fetch("Controller/rankController.php?addRank=" + data)
                .then(function(response) {
                    return response.text()
                })
                .then(function(res) {
                    document.getElementById("example1").innerHTML = res;
                    $("#rank").load("View/rank.php");

                })
        }
    </script>
</body>

</html>