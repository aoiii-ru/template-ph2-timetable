<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>時間割</title>
</head>
<body class="bg-slate-200 p-4">
    <h1 class="text-4xl font-bold text-stone-900 font-serif my-10 text-center">POSSE大学時間割</h1>

    <section class="flex justify-center items-stretch gap-12 px-28">
        <div class="bg-white shadow rounded-lg p-6 flex-1">
            <h3 class="text-lg font-bold text-center text-stone-900 pb-4">区画１：月曜日の時間割</h3>
            <table class="text-sm mx-auto w-full">
                <thead class="bg-slate-50 text-slate-700">
                    <tr>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">時限</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">授業名</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">担当教員</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">教室</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600">
                    @foreach ($set1 as $course)
                    <tr>
                        <td class=px-4 py-2 font-medium whitespace-nowrap>{{ $course->period }}</td>
                        <td class=px-4 py-2 font-medium whitespace-nowrap>{{ $course->name }}</td>
                        <td class=px-4 py-2 font-medium whitespace-nowrap>{{ $course->teacher }}</td>
                        <td class=px-4 py-2 font-medium whitespace-nowrap>{{ $course->room }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="bg-white shadow rounded-lg p-6 flex-1">
            <h3 class="text-lg font-bold text-center text-stone-900 pb-4">区画２：必修科目</h3>
            <table class="text-sm mx-auto w-full">
                <thead class="bg-slate-50 text-slate-700">
                    <tr>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">授業名</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">単位数</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600">
                    @foreach ($set2 as $course)
                    <tr>
                        <td class=px-4 py-2 font-medium whitespace-nowrap>{{ $course->name }}</td>
                        <td class=px-4 py-2 font-medium whitespace-nowrap>{{ $course->credits}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    
</body>
</html>