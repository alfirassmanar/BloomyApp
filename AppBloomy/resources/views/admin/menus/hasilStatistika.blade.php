<!-- resources/views/admin/menus/hasilStatistika.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="dicoding:email" content="d2024y030@dicoding.org">

    <title>Statistika Komputasi</title>
</head>

<body>
    <h1>Statistika Komputasi</h1>

    <!-- Menampilkan hasil analisis -->
    <h2>Descriptive Statistics</h2>
    <pre>{{ json_encode($results['descriptive_stats'], JSON_PRETTY_PRINT) }}</pre>

    <h2>Mean</h2>
    <pre>{{ json_encode($results['mean'], JSON_PRETTY_PRINT) }}</pre>

    <h2>Median</h2>
    <pre>{{ json_encode($results['median'], JSON_PRETTY_PRINT) }}</pre>

    <h2>Mode</h2>
    <pre>{{ json_encode($results['mode'], JSON_PRETTY_PRINT) }}</pre>

    <h2>Standard Deviation</h2>
    <pre>{{ json_encode($results['std_dev'], JSON_PRETTY_PRINT) }}</pre>

    <h2>Frequency Distribution</h2>
    <pre>{{ json_encode($results['frequency_distribution'], JSON_PRETTY_PRINT) }}</pre>

    <h2>Cronbach's Alpha</h2>
    <pre>{{ $results['cronbach_alpha'] }}</pre>

    <h2>T-test</h2>
    <pre>{{ json_encode($results['t_test'], JSON_PRETTY_PRINT) }}</pre>

    <h2>ANOVA</h2>
    <pre>{{ json_encode($results['anova'], JSON_PRETTY_PRINT) }}</pre>

    <h2>Correlation</h2>
    <pre>{{ json_encode($results['correlation'], JSON_PRETTY_PRINT) }}</pre>

</body>

</html>
