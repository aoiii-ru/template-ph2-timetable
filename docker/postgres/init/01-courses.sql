-- POSSE大学の授業データ（data-src/courses.py で生成）
CREATE TABLE courses (
  id SERIAL PRIMARY KEY,
  code TEXT NOT NULL,
  name TEXT NOT NULL,
  teacher TEXT,
  day INTEGER NOT NULL,      -- 1=月 〜 5=金
  period INTEGER NOT NULL,   -- 1限 〜 6限
  room TEXT NOT NULL,
  credits INTEGER NOT NULL,
  required BOOLEAN NOT NULL  -- 必修なら TRUE
);
INSERT INTO courses (code, name, teacher, day, period, room, credits, required) VALUES
('CS101', 'プログラミング入門', '前田 光', 1, 1, 'J201', 2, TRUE),
('EC100', '経済学入門', '藤田 剛', 1, 1, 'A101', 2, TRUE),
('IE110', '情報倫理', '岡田 恵', 1, 3, 'J101', 2, TRUE),
('EN101', '英語コミュニケーションⅠ', '石川 舞', 1, 2, 'B203', 1, TRUE),
('MA110', '微分積分', '小川 拓', 1, 4, 'C305', 2, FALSE),
('SO120', '社会学概論', '中島 葉月', 1, 5, 'A202', 2, FALSE),
('DB210', 'データベース論', '西村 亮', 2, 1, 'J201', 2, TRUE),
('EN102', '英語コミュニケーションⅡ', '石川 舞', 2, 2, 'B203', 1, TRUE),
('PG220', 'Webプログラミング演習', '前田 光', 2, 3, 'J201', 2, FALSE),
('LA150', '線形代数', '小川 拓', 2, 4, 'C305', 2, FALSE),
('HI130', '日本史概説', NULL, 2, 5, 'A101', 2, FALSE),
('ST201', '統計学', '大野 誠', 3, 2, 'J101', 2, TRUE),
('NW220', 'ネットワーク論', '西村 亮', 3, 4, 'J201', 2, FALSE),
('PS100', '心理学概論', '長谷川 茜', 3, 1, 'D110', 2, FALSE),
('DS230', 'データ分析演習', '大野 誠', 3, 3, 'J201', 2, FALSE),
('PE100', '体育実技', '村上 翔', 3, 5, '体育館', 1, FALSE),
('PG120', 'プログラミング演習', '前田 光', 4, 3, 'J201', 2, TRUE),
('PS200', '認知心理学', '長谷川 茜', 4, 4, 'D110', 2, FALSE),
('MK210', 'マーケティング論', '藤田 剛', 4, 2, 'A202', 2, FALSE),
('LI140', '文学講読', NULL, 4, 1, 'B101', 2, FALSE),
('CN100', '中国語Ⅰ', '王 静', 4, 5, 'B203', 1, FALSE),
('AL230', 'アルゴリズム', '前田 光', 5, 1, 'J101', 2, TRUE),
('SE240', 'ソフトウェア工学', '西村 亮', 5, 2, 'J101', 2, FALSE),
('UX250', 'UXデザイン演習', '岡田 恵', 5, 3, 'J202', 2, FALSE),
('CA200', 'キャリアデザイン', '中島 葉月', 5, 4, 'A101', 1, FALSE),
('SE300', 'ゼミナール', '大野 誠', 5, 5, 'J301', 2, TRUE),
('AI260', '人工知能概論', '小川 拓', 2, 1, 'J101', 2, FALSE),
('LW110', '法学入門', '森下 隆', 1, 2, 'A101', 2, FALSE),
('BZ120', '簿記演習', '藤田 剛', 3, 4, 'A202', 2, FALSE),
('ART100', '美術史', '中島 葉月', 4, 1, 'B101', 2, FALSE);
