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
        $wordCheck = $lettersArray[rand(1, (count($lettersArray) - 1))];
        if ($repetition == "si") {
            array_push($finalPassword, $wordCheck);
        } else if ($repetition == "no") {
            while (count($finalPassword) <= $passwordLength - 1) {
                $wordCheck = $lettersArray[rand(1, (count($lettersArray) - 1))];
                if (!in_array($wordCheck, $finalPassword)) {
                    array_push($finalPassword, $wordCheck);
                }
            }
        }
    }

    $a = json_encode($wordCheck);
    echo "<script> console.log('word',  $a)</script>";

    return implode("", $finalPassword);
}

?>