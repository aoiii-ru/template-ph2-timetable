# POSSE大学 時間割アプリ

PH2 の16週を通して育てていく、架空の「POSSE大学」の時間割アプリです。

最初は授業をすべて HTML に直接書いた1枚のページから始まります。W1 では SQL の SELECT だけを学び、W2 で Docker の PostgreSQL に授業と教室のデータを入れて表をつなぐ SQL を学び、W3 から Laravel を使って、授業をデータベースから表示するアプリに作り変えていきます。後の週で使う環境も最初からこのリポジトリに入っているので、週が進んでもこのリポジトリをそのまま使い続けます。

## フォルダ構成

```
.
├── index.html                 時間割ページ（授業を HTML に直接書いている）
├── sql/
│   ├── w01.sql                W1 の POSSE課題で SELECT 文を書くファイル
│   └── w02.sql                W2 の POSSE課題で JOIN・集計の SQL を書くファイル
├── database/
│   ├── courses.sql            授業データ（courses テーブル、30件）。正本はこちら
│   └── rooms.sql              教室データ（rooms テーブル、13件）。正本はこちら
├── compose.yaml               Docker の設定（web・app・db の3つのコンテナ）
├── docker/
│   ├── php/Dockerfile         app コンテナ（PHP 8.4 と composer）
│   ├── nginx/default.conf     web コンテナ（nginx）の設定
│   └── postgres/init/
│       ├── 01-courses.sql     database/courses.sql のコピー。db の初回起動時に読み込まれる
│       └── 02-rooms.sql       database/rooms.sql のコピー。01 の次に読み込まれる
└── src/                       Laravel のアプリ本体
```

週ごとに触る場所は次のとおりです。

| 週 | 触る場所 |
| --- | --- |
| W1 | `index.html`（見るだけ）と `sql/w01.sql` |
| W2 | `sql/w02.sql`、`compose.yaml` の db（PostgreSQL）、`database/rooms.sql`（見るだけ） |
| W3 から | `compose.yaml` と `docker/` の web・app、`src/` の Laravel |

`database/courses.sql` が授業データ、`database/rooms.sql` が教室データの正本です。どちらも中身は書き換えないでください。`docker/postgres/init/01-courses.sql` と `02-rooms.sql` は、db コンテナが初回起動時に読み込めるように置いた同じ内容のコピーです。ファイル名の番号の順に読み込まれるので、courses の次に rooms が作られます。

## W1 で触るファイル

- `index.html`：見るだけです。6つの区画に、条件ごとに絞り込んだ授業が並んでいます。
- `sql/w01.sql`：各区画と同じ結果を返す SELECT 文を書きます。

W1 では Docker を使いません。

## W2 で触るファイル

- `index.html`：見るだけです。区画7〜11（見出しに「（W2）」と付いた区画）に、授業と教室の表をつないだ結果や、集計した結果が並んでいます。
- `sql/w02.sql`：各区画と同じ結果を返す SQL を書きます。
- `database/rooms.sql`：見るだけです。教室の表（rooms）の作り方と中身が書いてあります。

W2 では db コンテナだけを起動し、psql で SQL を実行して確かめます。

```sh
# db コンテナだけを起動する
docker compose up -d db

# PostgreSQL に接続する（終わるときは \q）
docker compose exec db psql -U posse -d timetable
```

接続したら `\dt` で courses と rooms の2つの表があることを確かめてから始めてください。

## Docker での起動（W3 から）

W3 で教材サイトの指示が出てから行ってください。Docker Desktop（Windows は WSL2 の中）が動いていることが前提です。コマンドはこのリポジトリのフォルダで実行します。

```sh
# 1. コンテナを起動する（初回はイメージの作成に数分かかります）
docker compose up -d --build

# 2. Laravel が使うパッケージを入れる
docker compose exec app composer install

# 3. 設定ファイルを作り、暗号化キーを用意する
docker compose exec app cp .env.example .env
docker compose exec app php artisan key:generate

# 4. Laravel が使うテーブル（ログイン状態の保存先など）を PostgreSQL に作る
docker compose exec app php artisan migrate
```

ブラウザで http://localhost:8080 を開き、Laravel の初期ページが出れば準備完了です。

- db コンテナは初回起動時に `courses` テーブル（30件）と `rooms` テーブル（13件）を作ります。中身は `docker compose exec db psql -U posse -d timetable -c 'SELECT COUNT(*) FROM courses;'` で確かめられます。
- PostgreSQL の接続情報は、データベース名 `timetable`、ユーザー `posse`、パスワード `password`、ポート `5432` です。
- 止めるときは `docker compose down` です。データはボリュームに残ります。授業データを最初の状態に戻したいときは `docker compose down -v` でボリュームごと消してから、もう一度起動します。

## 教材サイト

課題の進め方と提出のしかたは教材サイトにあります。

https://posse-ph2.posse.workers.dev/
