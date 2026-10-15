-- W2 POSSE課題：index.html の区画7〜11と同じ結果を返す SQL を書く
-- 書いた SQL は db コンテナの psql（docker compose exec db psql -U posse -d timetable）で実行し、
-- 表示が index.html の区画と一致することを確かめてから書くこと
-- 曜日（day）は数字のまま返してよい

-- 区画7：すべての授業と教室の情報（科目コードの順）
select c.code, c.name, c.room, r.building, r.capacity
from courses c
left join rooms r
on c.room = r.code
order by c.code;

-- 区画8：曜日ごとの授業数（曜日の順）
select day, count(*)
from courses
group by day
order by day;


-- 区画9：建物ごとの授業数と合計単位（建物名の順）
select r.building, count(*), sum(c.credits)
from courses c
join rooms r
on c.room = r.code
group by r.building
order by r.building;

-- 区画10：授業を3つ以上担当している教員（授業数の多い順、同数なら名前の順）
select teacher, count(*)
from courses
group by teacher
having count(*)>=3
order by count(*) desc, teacher;

-- 区画11：授業が1つも入っていない教室（教室コードの順）
select r.code, r.building, r.capacity
from rooms r
left join courses c
on r.code = c.room
where c.room IS NULL
order by r.code;

-- 発展：「定員が80人以上の教室で行われる授業」の授業名・教室・定員を出す
select c.name, c.room, r.capacity
from courses c
join rooms r
on c.room = r.code
where r.capacity >= 80;