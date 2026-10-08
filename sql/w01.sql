-- W1 POSSE課題：index.html の各区画と同じ結果を返す SELECT 文を書く
-- 書いた SQL は教材サイトの「SQL練習場」で実行し、表示が index.html の区画と一致することを確かめてから書くこと
-- 曜日（day）は数字のまま返してよい

-- 区画1：月曜日の授業（時限の早い順）
SELECT PERIOD, NAME, teacher, room
FROM courses
WHERE DAY=1
ORDER BY PERIOD ASC;


-- 区画2：必修科目（科目コードの順）
SELECT NAME, credits
FROM courses
WHERE required=TRUE
ORDER BY code ASC;


-- 区画3：3限以降の2単位の授業（曜日→時限の順）
SELECT DAY, PERIOD, NAME
FROM courses
WHERE PERIOD>=3
    AND credits=2
ORDER BY DAY, PERIOD ASC;

-- 区画4：演習の授業（科目コードの順）
SELECT NAME, teacher, room
FROM courses
WHERE NAME LIKE '%演習'
ORDER BY code ASC;


-- 区画5：J棟の授業（金曜以外。曜日→時限の順）
SELECT DAY, PERIOD, NAME, room
FROM courses
WHERE room LIKE 'J%'
    AND day<>5
ORDER BY DAY, PERIOD ASC;


-- 区画6：担当教員が未定の授業（科目コードの順）
SELECT code, NAME
FROM courses
WHERE teacher IS NULL
ORDER BY code ASC;

-- 発展1 : 1限以外の授業　(曜日、時限順)
SELECT DAY,PERIOD, NAME, teacher, room
FROM courses
WHERE period<>1
ORDER BY DAY, PERIOD ASC;

-- 発展2 : 石川舞先生が担当している授業　(曜日、時限順)
SELECT DAY,PERIOD, NAME, room, room
FROM courses
WHERE teacher LIKE '石川 舞'
ORDER BY DAY, PERIOD ASC;
