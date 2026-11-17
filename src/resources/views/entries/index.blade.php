<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>時間割登録</title>
</head>
<body class="bg-white">
    <h1 class="text-4xl font-bold text-stone-900 font-serif my-10 text-center">POSSE大学時間割</h1>

    <section class="flex justify-center items-stretch mx-20">
        <div class="bg-white shadow rounded-lg p-6 flex-1">
            <h3 class="text-lg font-bold text-center text-stone-900 pb-4">時間割</h3>
            <p class="text-right pb-4">
                <a href="/entries/create" class="text-blue-700 underline">授業を新たに登録</a>
            </p>
            <table class="text-sm mx-auto w-full">
                <thead class="bg-slate-50 text-slate-700">
                    <tr>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">曜日</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">時限</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">授業名</th>
                        <th class="px-4 py-2 font-semibold whitespace-nowrap">教室</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600 text-center">
                    @forelse ($entries as $course)
                    <tr>
                        <td class=px-4 py-4 font-medium whitespace-nowrap>{{ $course->day }}</td>
                        <td class=px-4 py-4 font-medium whitespace-nowrap>{{ $course->period }}</td>
                        <td class=px-4 py-4 font-medium whitespace-nowrap>{{ $course->title }}</td>
                        <td class=px-4 py-4 font-medium whitespace-nowrap>{{ $course->room }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-slate-400">まだ授業が登録されていません</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>