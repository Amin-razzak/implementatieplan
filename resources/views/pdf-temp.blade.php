
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<?php echo 'Naam: '.$longArrays[0]['naam'].'<br>';?>
<?php echo 'Adres: '.$longArrays[0]['Adres'].'<br>';?>
<?php echo 'Postcode: '.$longArrays[0]['postcode'].'<br>';?>
<?php echo 'Email: '.$longArrays[0]['email'].'<br>';?>

<table class="table">
    <thead class="thead-inverse">
    <tr>

        <th>Artikel</th>
        <th>Omschrijving</th>
        <th>Aantal</th>
        <th>Prijs</th>
        <th>Totale prijs</th>
    </tr>
    </thead>
    <?php

    $a = 0;
    $b = 0;
    $c = 0;
    $d = 0;
    $e = 0;
    $f = 0;
    ?>
    @foreach($longArrays as $longArray)

        <tr>

            <td>{{$longArrays[2][$a++]['artikel']}}</td>
            <td>{{$longArrays[2][$b++]['omschrijving']}}</td>
            <td>{{$longArrays[2][$c++]['aantal']}}</td>
            <td>{{$longArrays[2][$d++]['prijs']}}</td>
            <td>&#8364; {{$longArrays[2][$e++]['totaal_prijs']}}</td>
        </tr>



    @endforeach
    <tr>
        <td>
            <?php echo'&#8364; '.$longArrays[1]['totaal_prijs'];?>
        </td>
    </tr>
</table>

</body>
</html>
