<?php  
function checkLengthPass()
{
    if (isset($_GET["passwordLength"])) {
        return $_GET["passwordLength"];
    } else {
        return null;
    }
}

function getPassword()
{
    $passwordLength = checkLengthPass();
    if ($passwordLength == null) {
        return print_r("Nessun parametro valido inserito.");
    }
    $repetition = $_GET["repetition"];
    $finalPassword = [];
    $stringSource = "abcdefghijklmnopqrstuvwyz1234567890,.-*<>!$%&/(=?^+{}";
    $numberSource = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
    $symbolSource = ",.-*<>!$%&/(=?^+{}";
    $lettersArray = str_split($stringSource);
    $symbolArray = str_split($symbolSource);

    for ($i = 0; $i <= $passwordLength - 1; $i++) {

        if ($repetition == "si") {
            array_push($finalPassword, $lettersArray[rand(1, (count($lettersArray) - 1))]);
        } else if ($repetition == "no") {
            while (count($finalPassword) <= $passwordLength - 1) {
                if (!in_array($lettersArray[rand(1, (count($lettersArray) - 1))], $finalPassword)) {
                    array_push($finalPassword, $lettersArray[rand(1, (count($lettersArray) - 1))]);
                }
            }
        }
    }

    $a = json_encode($lettersArray[rand(1, (count($lettersArray)))]);
    echo "<script> console.log('finalPass:',  $a)</script>";

    return implode("", $finalPassword);
}

?>