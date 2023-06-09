<?php
$numberSource = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
$symbolSource = ",.-°*<>!£$%&/()=?^+·{}";

if (isset($_GET["passwordLength"])) {
    $passwordLength = $_GET["passwordLength"];
}

function getPassword($passwordLength)
{
    $finalPass = [];
    $stringSource = "abcdefghijklmnopqrstuvwyzABCDEFGHIJKLMNOPQRSTUVWYZ";
    $lettersArray = str_split($stringSource);

    for ($i = 0; $i <= $passwordLength; $i++) {
        $finalPass = $lettersArray[rand(1, count($lettersArray))];
    }
    return var_dump($finalPass);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Password Generator</title>
</head>

<body>
    <div class="container-lg mt-5">
        <div class="row w-100">
            <div class="col-12">
                <h1 class="title text-center my-4">Strong Password Generator</h1>
            </div>
        </div>
        <div class="row w-100">
            <div class="col-12">
                <h2 class="text-center text-light mb-4">Genera una password sicura</h2>
            </div>
        </div>
        <div class="row">
            <div class="passwordContainer col-11 mt-3 mb-5">
                <?php if (isset($_GET["passwordLength"])) {?>
               <?php getPassword($passwordLength);} ?> 
                
            </div>
        </div>
        <div class="row">
            <div class="optContainer col-11">
                <div class="row">
                    <div class="col-12">
                        <form action="index.php" method="GET">
                            <div class="row">
                                <div class="col-10 d-flex justify-content-between px-5 pt-5 fs-4">
                                    <label for="passwordLength">Lunghezza password:</label>
                                    <input type="number" name="passwordLength">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 d-flex justify-content-between px-5 pt-5 fs-4">
                                    <div>
                                        <p>Consenti ripetizioni di uno o più caratteri:</p>
                                    </div>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="repetition" id="flexRadioDefault1" value="true">
                                            <label class="form-check-label" for="repetition">
                                                Sì
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="repetition" id="flexRadioDefault2" value="false">
                                            <label class="form-check-label" for="repetition">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row ms-5">
                                <div class="col-10 d-flex flex-column align-items-end px-5 mt-5 fs-4 ms-4">
                                    <div class="d-flex">
                                        <input type="checkbox" value="true" name="letter">
                                        <label class="ms-3" for="letter">Lettere</label>
                                    </div>
                                    <div class="d-flex">
                                        <input type="checkbox" value="true" name="number">
                                        <label class="ms-3" for="number">Numeri</label>
                                    </div>
                                    <div class="d-flex">
                                        <input type="checkbox" value="true" name="symbol">
                                        <label class="ms-3" for="symbol">Simboli</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-5">
                                    <button type="submit" class="btn btn-primary me-1">Invia</button>
                                    <button type="reset" class="btn btn-secondary">Annulla</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>