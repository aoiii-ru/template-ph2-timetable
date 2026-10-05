-- POSSE大学の教室データ（rooms テーブル、13件）
-- code は courses.room と同じ教室コード。体育館は教室ではないので登録していない
CREATE TABLE rooms (
  code TEXT PRIMARY KEY,
  building TEXT NOT NULL,
  floor INTEGER NOT NULL,     -- 何階にあるか
  capacity INTEGER NOT NULL   -- 定員（人）
);
INSERT INTO rooms (code, building, floor, capacity) VALUES
('A101', 'A棟', 1, 120),
('A202', 'A棟', 2, 80),
('B101', 'B棟', 1, 60),
('B102', 'B棟', 1, 40),
('B203', 'B棟', 2, 40),
('C201', 'C棟', 2, 50),
('C305', 'C棟', 3, 100),
('D110', 'D棟', 1, 150),
('J101', 'J棟', 1, 60),
('J201', 'J棟', 2, 50),
('J202', 'J棟', 2, 40),
('J301', 'J棟', 3, 30),
('J302', 'J棟', 3, 40);
