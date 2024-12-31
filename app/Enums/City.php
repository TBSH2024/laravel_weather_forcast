<?php

namespace App\Enums;

enum City: string {
  case Tokyo = 'tokyo';
  case Osaka = 'osaka';
  case Sapporo = 'sapporo';
  case Fukuoka = 'fukuoka';
  case Nagoya = 'nagoya';

  public function getCoordinates(): array
  {
    return match($this) {
      self::Tokyo => ['latitude' => 35.6895, 'longitude' => 139.6917],
      self::Osaka => ['latitude' => 34.0522, 'longitude' => 135.7550],
      self::Sapporo => ['latitude' => 43.0618, 'longitude' => 141.3545],
      self::Fukuoka => ['latitude' => 33.5902, 'longitude' => 130.4017],
      self::Nagoya => ['latitude' => 35.1815, 'longitude' => 136.9066],
    };
  }

  public function getKanjiName(): string
  {
    return match($this) {
      self::Tokyo => '東京',
      self::Osaka => '大阪',
      self::Sapporo => '札幌',
      self::Fukuoka => '福岡',
      self::Nagoya => '名古屋',
    };
  }

  public static function getAllCities(): array
  {
    return array_map(fn($city) => 
    [
      'english_name' => $city->value,
      'kanji_name' => $city->getKanjiName(),
    ],City::cases());
  }
}