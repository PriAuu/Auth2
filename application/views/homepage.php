<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style//homepage.css">
    <title>Document</title>
</head>

<body>
    <?php if (empty($this->session->userdata['email'])) { ?>

        <div class="container">
            <div class="row">

                <div class="col-md-4 mt-5">
                    <img src="/assets/img/homepage.jpg" alt="" width="467px">
                </div>

                <div class="col-md-8 mt-5">

                    <h4 style="margin-left: 80px; font-weight:600;">History of Care Bears (Care Bears) dolls from which country?</h4>
                    <p style="margin-left: 80px; font-size:20px;">
                    Care Bears is the name of the American teddy bear collection. It first <br>
                    appeared as a cute cartoon bear pattern on American Greetings' <br>
                    greeting cards in 1981. It was created by Elena Kucharik, an illustrator <br>
                    who has been very successful in bringing care bears tolife. A character <br>
                    that appeals to both children and adults.
                    </p>

                </div>

            </div>
        </div>

    <?php } else { ?>
        <div>
            <div class="container">

                <div class="row text-center">
                    <div class="col-md-4">
                        <img class="bear" src="/assets/img/b1.jpg" width="170px" alt=""><br>
                        <p class="font-bear">Tenderheart Bear</p>
                    </div>
                    <div class="col-md-4">
                        <img class="bear" src="/assets/img/b2.jpg" width="170px" alt=""><br>
                        <p class="font-bear">Good Luck Bear</p>
                    </div>
                    <div class="col-md-4">
                        <img class="bear" src="/assets/img/b3.jpg" width="170px" alt=""><br>
                        <p class="font-bear">Cheer Bear</p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-4">
                        <img class="bear" src="/assets/img/b4.jpg" width="170px" alt=""><br>
                        <p class="font-bear">Bedtime Bear</p>
                    </div>
                    <div class="col-md-4">
                        <img class="bear" src="/assets/img/b5.jpg" width="170px" alt=""><br>
                        <p class="font-bear">Love A Lot Bear</p>
                    </div>
                    <div class="col-md-4">
                        <img class="bear" src="/assets/img/b6.jpg" width="170px" alt=""><br>
                        <p class="font-bear">Funshine Bear</p>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-6">
                        <img class="bear" src="/assets/img/b7.jpg" width="170px" alt=""><br>
                        <p class="font-bear">Wish Bear</p>
                    </div>
                    <div class="col-md-6">
                        <img class="bear" src="/assets/img/b8.jpg" width="170px" alt=""><br>
                        <p class="font-bear">Grumpy Bear</p>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>
</body>

</html>