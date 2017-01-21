<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fuzzer MD5</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body style="background: #533; color: #aaa;">
<table class="table table-hover">
    <thead>
        <tr>
            <td>$i [1 - n]</td>
            <td>Hash created</td>
            <td>Hash destination</td>
        </tr>
    </thead>
    <tbody>
        <?php        
            // debug
            ini_set( 'display_errors', 'On' ); 
            error_reporting( E_ALL );
            
            // main
            $hash = md5("1");
            $buff = md5($hash);
            $nextBuff = 0;
            $counter = 0;
            $counterArray = 0;

            // FIRST ROW
            echo '<tr>';
            echo '<td>' . $counter . '</td>' .
                 '<td class="text-warning">' . $buff . '</td>' .
                 '<td class="text-danger">' . $hash . '</td>' .
            '</tr>';
            
            // LOGIC FUZZER
            while(true) 
            {
                $counter++;
                $counterArray++;

                if($buff != $hash) 
                {
                    $nextBuff = $buff;
                    $buff = md5($nextBuff);

                    if ( $counterArray == 100 )
                    {
                        $counterArray = 0;
                        
                        echo "<script>
                            setTimeout( function() {
                                $('table > tbody *').remove();
                            }, 200);
                        </script>";
                        //return false;
                    } else {
                        echo '<td>' . $counter . '</td>' .
                            '<td class="text-warning">' . $buff . '</td>' .
                            '<td class="text-danger">' . $hash . '</td>' .
                        '</tr>';
                    }
                }
                else {
                    echo '<td class="text-success">' . $counter . '</td>' .
                        '<td class="text-success">' . $buff . '</td>' .
                        '<td class="text-success">' . $hash . '</td>' .
                    '</tr>';
                }
            }
        ?>
    </tbody>
</table>
</body>
</html>

<!-- 
    1. Wygenerować HASH z "1".
    2. Przypisać do stałej jako baza do porównania
    3. Generować HASH od bazy poczym powstały hash zapisywać i znowu wrzucać do md5.
    4. Sprawdzać czy przypadkiem $buff === hash jeżeli tak to wypisać iteracje przy ktorej to sie stalo,
        a co za tym idzie wprowadzić counter.
    5. No jeżeli się nie udało znaleźć to counter++ oraz wpisywać do tablicy cały cas i na ekran, 
        jeżeli tablica przekroczy 50 rekordów to wrzucać, to czyścimy ją i od nowa od zera uploadujemy
        wyrzucajac takze info na ekran.
-->