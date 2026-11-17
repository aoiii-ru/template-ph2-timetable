<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>授業登録</title>
</head>
<body class="bg-white">
    <h1 class="text-4xl font-bold text-stone-900 font-serif my-10 text-center">POSSE大学時間割</h1>

    <section class="flex justify-center items-stretch">
        <div class="bg-white shadow rounded-lg p-6 flex-1">
            <h3 class="text-lg font-bold text-center text-stone-900 pb-4">授業登録</h3>
            <form method="POST" action="/entries">
                @csrf

                <table class="text-sm mx-auto w-full">
                    <thead class="bg-slate-50 text-slate-700">
                        <tr>
                            <th class="px-4 py-2 font-semibold whitespace-nowrap text-left">項目</th>
                            <th class="px-4 py-2 font-semibold text-left">入力内容</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-600">
                        <tr>
                            <td class="px-4 py-2 font-medium whitespace-nowrap">
                                <label for="day">曜日</label>
                            </td>
                            <td class="px-4 py-2">
                                <select id="day" name="day" required class="border border-slate-300 rounded p-2 w-full">
                                    <option value="">曜日を選択してください</option>
                                    @foreach (['月', '火', '水', '木', '金'] as $index => $day)
                                        <option value="{{ $index + 1 }}" @selected(old('day') == $index + 1)>{{ $day }}曜日</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-medium whitespace-nowrap">
                                <label for="period">時限</label>
                            </td>
                            <td class="px-4 py-2">
                                <input id="period" name="period" type="number" min="1" max="6" value="{{ old('period') }}" required class="border border-slate-300 rounded p-2 w-full">
                                @error('period')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-medium whitespace-nowrap">
                                <label for="title">授業名</label>
                            </td>
                            <td class="px-4 py-2">
                                <input id="title" name="title" type="text" value="{{ old('title') }}" required class="border border-slate-300 rounded p-2 w-full">
                                @error('title')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-medium whitespace-nowrap">
                                <label for="room">教室</label>
                            </td>
                            <td class="px-4 py-2">
                                <input id="room" name="room" type="text" value="{{ old('room') }}" class="border border-slate-300 rounded p-2 w-full">
                                @error('room')
                                    <p class="text-red-600">{{ $message }}</p>
                                @enderror
                            </td>
                        </tr>
                    </tbody>
                </table>

                @error('day')
                    <p class="text-red-600 pt-2">{{ $message }}</p>
                @enderror

                <div class="flex justify-between pt-4">
                    <a href="/entries" class="text-blue-700 underline">一覧に戻る</a>
                    <button type="submit" class="bg-slate-700 text-white rounded px-4 py-2">登録</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
