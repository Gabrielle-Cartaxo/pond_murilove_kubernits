<!DOCTYPE html>
<html>
<head>
    <title>PHP CPU Stress Test</title>
    <style>
        body { font-family: sans-serif; background-color: #f0f0f0; color: #333; }
        .container { max-width: 800px; margin: 40px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1, h2 { color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cluster Kubernetes com HPA</h1>
        <h2>Pod: <?php echo gethostname(); ?></h2>
        <p>Esta página realiza um cálculo para estressar a CPU e testar o auto-escalonamento.</p>
        <?php
            // Função para estressar a CPU
            function isPrime($num) {
                if ($num <= 1) return false;
                for ($i = 2; $i <= sqrt($num); $i++) {
                    if ($num % $i == 0) return false;
                }
                return true;
            }

            $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20000;
            $primes_found = 0;
            $start_time = microtime(true);

            for ($i = 1; $i <= $limit; $i++) {
                if (isPrime($i)) {
                    $primes_found++;
                }
            }

            $end_time = microtime(true);
            $execution_time = round($end_time - $start_time, 4);

            echo "<p>Cálculo de números primos até <b>$limit</b> concluído em <b>$execution_time</b> segundos.</p>";
        ?>
    </div>
</body>
</html>