<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // データの取得とエスケープ処理
    $experience = htmlspecialchars($_POST['experience'], ENT_QUOTES);
    $fields = isset($_POST['fields']) ? implode(',', $_POST['fields']) : '選択なし';
    $frequency = htmlspecialchars($_POST['frequency'], ENT_QUOTES);
    $contact = htmlspecialchars($_POST['contact'], ENT_QUOTES) ?: '未入力';
    $timestamp = date('Y-m-d H:i:s');

    // 保存用データ
    $data = [$experience, $fields, $frequency, $contact, $timestamp];

    // CSVに保存
    $file = 'volunteer_data.csv';
    $fp = fopen($file, 'a');
    if ($fp) {
        fputcsv($fp, $data);
        fclose($fp);
        echo "アンケートが送信されました。<a href='read.php'>結果を見る</a>";
    } else {
        echo "エラーが発生しました。";
    }
} else {
    echo "無効なリクエストです。";
}
?>