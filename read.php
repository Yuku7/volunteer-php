<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート結果</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>ボランティアアンケート結果</h1>
    <table border="1">
        <tr>
            <th>ボランティア経験</th>
            <th>興味のある分野</th>
            <th>希望する頻度</th>
            <th>連絡先</th>
            <th>回答日時</th>
        </tr>
        <?php
        $file = 'volunteer_data.csv';
        $experienceCounts = ['あり' => 0, 'なし' => 0];
        $frequencyCounts = ['週1回以上' => 0, '月1回以上' => 0, '不定期' => 0];
        $fieldsCounts = [];

        if (file_exists($file)) {
            $fp = fopen($file, 'r');
            while ($row = fgetcsv($fp)) {
                echo '<tr>';
                foreach ($row as $value) {
                    echo '<td>' . htmlspecialchars($value, ENT_QUOTES) . '</td>';
                }
                echo '</tr>';

                // 集計
                $experienceCounts[$row[0]]++;
                $frequencyCounts[$row[2]]++;
                foreach (explode(',', $row[1]) as $field) {
                    $fieldsCounts[$field] = ($fieldsCounts[$field] ?? 0) + 1;
                }
            }
            fclose($fp);
        }
        ?>
    </table>

    <h2>集計結果</h2>
    <canvas id="experienceChart"></canvas>
    <canvas id="fieldsChart"></canvas>
    <canvas id="frequencyChart"></canvas>

    <script>
        // ボランティア経験グラフ
        const experienceCtx = document.getElementById('experienceChart').getContext('2d');
        new Chart(experienceCtx, {
            type: 'pie',
            data: {
                labels: ['あり', 'なし'],
                datasets: [{
                    data: [<?php echo $experienceCounts['あり']; ?>, <?php echo $experienceCounts['なし']; ?>],
                    backgroundColor: ['#FF6384', '#36A2EB'],
                }]
            }
        });

        // 興味のある分野グラフ
        const fieldsCtx = document.getElementById('fieldsChart').getContext('2d');
        new Chart(fieldsCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_keys($fieldsCounts)); ?>,
                datasets: [{
                    label: '回答数',
                    data: <?php echo json_encode(array_values($fieldsCounts)); ?>,
                    backgroundColor: '#FFCE56',
                }]
            }
        });

        // 希望する頻度グラフ
        const frequencyCtx = document.getElementById('frequencyChart').getContext('2d');
        new Chart(frequencyCtx, {
            type: 'bar',
            data: {
                labels: ['週1回以上', '月1回以上', '不定期'],
                datasets: [{
                    label: '回答数',
                    data: [<?php echo $frequencyCounts['週1回以上']; ?>, <?php echo $frequencyCounts['月1回以上']; ?>, <?php echo $frequencyCounts['不定期']; ?>],
                    backgroundColor: '#4BC0C0',
                }]
            }
        });
    </script>
</body>
</html>