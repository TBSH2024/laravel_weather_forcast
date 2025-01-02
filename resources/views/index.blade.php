<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>天気アプリ -TOP</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
  <div class="min-h-screen flex items-center justify-center">
    <div class="flex flex-col bg-white rounded-lg shadow-xl p-6 w-full max-w-xs">
      <div class="font-bold text-xl text-center mb-4">天気アプリ</div>
      <div class="mb-6">
        <label for="city" class="block text-sm font-medium text-gray-700">都市を選択</label>
        <div class="relative mt-1">
          <select id="city-selector" name="city" class="block appearance-none w-full bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 py-2 px-4 pr-8 text-sm">
            @foreach ($cities as $c)
            <option value="{{ $c['english_name'] }}" @selected($c['english_name'] === $city->name)>{{ $c['kanji_name'] }}</option>
            @endforeach
          </select>
          <div class="absolute top-1/2 right-0 transform -translate-y-1/2 px-4 text-gray-500">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path></svg>
          </div>
        </div>
      </div>
      <div class="font-bold text-xl">{{ $kanjiCityName }}</div>
      <div class="text-sm text-gray-500">{{ date('Y-m-d H:i', strtotime($weatherData['current']['time'])) }}</div>
      <div class="mt-6 text-6xl self-center inline-flex items-center justify-center rounded-lg text-indigo-400 h-24 w-24">
        @if ($weatherData['current']['weather_code'] === 0)
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
        @elseif($weatherData['current']['weather_code'] >= 1 || $weatherData['current']['weather_code'] <= 3)
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 18.004h-5.343c-2.572 -.004 -4.657 -2.011 -4.657 -4.487c0 -2.475 2.085 -4.482 4.657 -4.482c.393 -1.762 1.794 -3.2 3.675 -3.773c1.88 -.572 3.956 -.193 5.444 1c1.488 1.19 2.162 3.007 1.77 4.769h.99c1.913 0 3.464 1.56 3.464 3.486c0 .186 -.015 .37 -.042 .548" /><path d="M16 19h6" /></svg>
        @elseif($weatherData['current']['weather_code'] >= 50 && $weatherData['current']['weather_code'] < 70)
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7" /><path d="M11 13v2m0 3v2m4 -5v2m0 3v2" /></svg>
        @elseif($weatherData['current']['weather_code'] >= 70 && $weatherData['current']['weather_code'] < 80)
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 4l2 1l2 -1" /><path d="M12 2v6.5l3 1.72" /><path d="M17.928 6.268l.134 2.232l1.866 1.232" /><path d="M20.66 7l-5.629 3.25l.01 3.458" /><path d="M19.928 14.268l-1.866 1.232l-.134 2.232" /><path d="M20.66 17l-5.629 -3.25l-2.99 1.738" /><path d="M14 20l-2 -1l-2 1" /><path d="M12 22v-6.5l-3 -1.72" /><path d="M6.072 17.732l-.134 -2.232l-1.866 -1.232" /><path d="M3.34 17l5.629 -3.25l-.01 -3.458" /><path d="M4.072 9.732l1.866 -1.232l.134 -2.232" /><path d="M3.34 7l5.629 3.25l2.99 -1.738" /></svg>
        @else
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 8h.01" /><path d="M7 3h11a3 3 0 0 1 3 3v11m-.856 3.099a2.991 2.991 0 0 1 -2.144 .901h-12a3 3 0 0 1 -3 -3v-12c0 -.845 .349 -1.608 .91 -2.153" /><path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" /><path d="M16.33 12.338c.574 -.054 1.155 .166 1.67 .662l3 3" /><path d="M3 3l18 18" /></svg>
        @endif
      </div>
      <div class="flex flex-row items-center justify-center mt-6">
        <div class="font-medium text-6xl">{{ $weatherData['current']['temperature_2m'] }}°</div>
      </div>
      <div class="text-center mt-6">
        <div class="font-medium text-sm">湿度</div>
        <div class="text-sm text-gray-500">{{ $weatherData['current']['relative_humidity_2m'] }}%</div>
      </div>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6" id="openModal" type="button">詳細を見る</button>
    </div>
  </div>
  <!-- モーダル -->
  <div id="weatherModal" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-8 w-96 max-h-[500px] overflow-y-auto relative">
      <button class="absolute top-2 right-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-full" id="closeModal">×</button>
      <h2 class="text-2xl font-bold text-center text-indigo-600 mb-4">天気詳細</h2>
      @foreach ($weatherData['hourly']['time'] as $index => $hourlyTime)
        <ul>
          <li class="text-lg text-gray-700">
            {{ date('Y-m-d H:i', strtotime($hourlyTime)) }}
            {{ $weatherData['hourly']['temperature_2m'][$index]}}
          </li>
        </ul>
      @endforeach
    </div>
  </div>
</body>
</html>