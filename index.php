<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ボランティアアンケート</title>
</head>
<body>
    <h1>ボランティアアンケート</h1>
    <p>以下のアンケートにご協力ください。</p>
    <form action="write.php" method="post">
        <h2>ボランティア経験について</h2>
        <label>
            <input type="radio" name="experience" value="あり" required> あり
        </label><br>
        <label>
            <input type="radio" name="experience" value="なし"> なし
        </label><br>

        <h2>興味のある分野 (複数選択可)</h2>
        <label>
            <input type="checkbox" name="fields[]" value="環境保護"> 環境保護
        </label><br>
        <label>
            <input type="checkbox" name="fields[]" value="教育支援"> 教育支援
        </label><br>
        <label>
            <input type="checkbox" name="fields[]" value="災害支援"> 災害支援
        </label><br>
        <label>
            <input type="checkbox" name="fields[]" value="福祉活動"> 福祉活動
        </label><br>

        <h2>希望する活動頻度</h2>
        <label>
            <input type="radio" name="frequency" value="週1回以上" required> 週1回以上
        </label><br>
        <label>
            <input type="radio" name="frequency" value="月1回以上"> 月1回以上
        </label><br>
        <label>
            <input type="radio" name="frequency" value="不定期"> 不定期
        </label><br>

        <h2>連絡先（任意）</h2>
        <input type="email" name="contact" placeholder="example@example.com"><br><br>

        <button type="submit">送信</button>
    </form>
</body>
</html>
