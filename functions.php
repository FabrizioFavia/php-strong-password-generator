<?php  

function getCheck($getItem)
{
    if (isset($_GET["$getItem"])) {
        return $_GET["$getItem"];
    } else {
        return null;
    }
}

function getPassword()
{
    $passwordLength = getCheck("passwordLength");
    $lettersIncluded = getCheck("letter");
    $numbersIncluded = getCheck("number");
    $symbolIncluded = getCheck("symbol");
    $repetitionIncluded = getCheck("repetition");
    $finalPassword = [];
    $selectedArray = [];
    $stringSource = "abcdefghijklmnopqrstuvwyz1234567890,.-*!$%&/(=?^+{}";
    $generalArray = str_split($stringSource);
    $lettersArraySlice = array_slice($generalArray, 0, 25);
    $numbersArraySlice = array_slice($generalArray, 25, 9);
    $symbolsArraySlice = array_slice($generalArray, 35, 18);

    if ($passwordLength == null) {
        echo "Nessun parametro valido inserito.";
        return null;
    }
    

    if (($numbersIncluded == "si" && $symbolIncluded == "si" && $lettersIncluded == "si") || ($numbersIncluded == null && $symbolIncluded == null && $lettersIncluded == null)) {
        $selectedArray = $generalArray;
    }elseif ($numbersIncluded == "si") {
        $selectedArray = $numbersArraySlice;
    } elseif($symbolIncluded == "si"){
        $selectedArray = $symbolsArraySlice;
    } elseif($lettersIncluded == "si"){
        $selectedArray = $lettersArraySlice;
    }

    $a = json_encode($selectedArray);
    echo "<script> console.log('SELECTED',  $a)</script>";

    for ($i = 0; $i <= $passwordLength - 1; $i++) {
        $wordCheck = $selectedArray[rand(1, (count($selectedArray) - 1))];
        if ($repetitionIncluded == "si") {
            array_push($finalPassword, $wordCheck);
        } else if ($repetitionIncluded == "no") {
            while (count($finalPassword) <= $passwordLength - 1) {
                $wordCheck = $selectedArray[rand(1, (count($selectedArray) - 1))];
                if (!in_array($wordCheck, $finalPassword)) {
                    array_push($finalPassword, $wordCheck);
                }
            }
        }
    }
    session_start();
    $_SESSION["finalPassword"] = implode("", $finalPassword);
    header('Location: location.php');

    return implode("", $finalPassword);
    
    ;
}
