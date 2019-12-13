<?php
$variable1 = '1.23';
$variable2 = 28;
$variable3 = 'null';
$variable4 = [
    123,
    false,
    1.23,
    FALSE,
    [],
    TRUE,
];
$variable5 = (float) -123;
$variable6 = 'false';
$variable7 = 'php39';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Today I \'ll learn PHP - "Variable"</h1>
    <h1>This is a bad command : del c:\*.*</h1>
    <br>
    <div id="result"></div>
    <script type="text/javascript">
        var text = '<h1>Today I \\\'ll learn PHP - "Variable" </h1>';
        text += '<h1>This is a bad command : del c:\\*.*</h1>'
        document.getElementById('result').innerHTML = text;
    </script>

<?php
    $text = '<br>'.'<h1>Today I \\\'ll learn PHP - "Variable"</h1>' . '<h1>This is a bad command : del c:\\*.*</h1>' . '<br>';
    echo $text;

    $variable1 = null;
    $variable_int = (int) $variable1;
    var_dump($variable_int);
    $variable_float = (float) $variable1;
    var_dump($variable_float);
    $variable_string = (string) $variable1;
    var_dump($variable_string);
    $variable_boolean = (boolean) $variable1;
    var_dump($variable_boolean);

    $string = 'abc';

?>
<form onsubmit="">

</form>
</body>
</html>
