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
      <h1 class="text-2xl font-bold mb-4">天気予報</h1>
      <select name="city" id="city-selector">
        <option value="">選択してください</option>
        @foreach ($cities as $c)
        <option value="{{ $c['english_name'] }}" @selected($c['english_name'] === $city->name)>{{ $c['kanji_name'] }}</option>
        @endforeach
      </select>
      <p>気温：{{ $weatherData['current']['temperature_2m'] }}℃</p>
      <p>現在時刻：{{ $weatherData['current']['time'] }}</p>
      <p>現在時刻：{{ $weatherData['current']['relative_humidity_2m'] }}</p>
    </div>
  </div>
</body>
</html>