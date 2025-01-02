<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>天気アプリ -TOP</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <div class="bg-gray-100">
    <div class="container mx-auto p-4">
      <h1 class="text-2xl font-bold mb-4">天気予報 -{{ $city->name }}</h1>
      <select name="city" id="city-selector">
        <option value="">選択してください</option>
        @foreach ($cities as $c)
        <option </option>
        @endforeach
      </select>
      <p>気温：{{ $weatherData['current']['temperature_2m'] }}℃</p>
      <p>現在時刻：</p>
      <p>現在時刻：{{ $weatherData['current']['relative_humidity_2m'] }}</p>
      <button class="" id="openModal" type="button">詳細を見る</button>
      <div id="weatherModal" class="hidden">
        <ul>
          @foreach ($weatherData['hourly']['time'] as $index => $hourlyTime)
          <li>
            <span>
              {{ date('Y-m-d H:i', strtotime($hourlyTime)) }}
              {{ $weatherData['hourly']['temperature_2m'][$index]}}
            </span>
          </li>
          @endforeach
        </ul>
        <button id="closeModal" type="button">閉じる</button>
      </div>
    </div>
  </div>
</body>
</html>