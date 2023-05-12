<?php
require './partsNOEDIT/connect-db.php';

$output = [
    'success' => false, #新增資料成功或失敗的結果（MUST）
    'postData' => $_POST, # 除錯用的
    'code' => 0,
    'error' => [],
];


if (!empty($_POST['XXX'])) { #若附合此條件，則可以往下走

    $isPass = true;
    # TODO：檢查欄位資料,判斷格式錯，isPass設為false （MUST）
    # TODO：整理變數，轉換資料格式

    $sql = "INSERT INTO 資料表(
    欄位們, 現在時間
    ) VALUES (
    ?,  NOW()
    )"; #(你的sql)

    $stmt = $pdo->prepare($sql);

    if ($isPass) { #以上所有條件成立，add到資料庫
        $stmt->execute([
            #變數或固定資料
        ]);

        $output['success'] = !!$stmt->rowCount(); #若加成功，$output訊息的success會顯示true
    }
} else {
    $output['error'] = "xxx"; #不符合條件
}


header('Content-Type: application/json');
echo json_encode($output, JSON_UNESCAPED_UNICODE);
