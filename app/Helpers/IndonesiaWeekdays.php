<?php

namespace App\Helpers;

use Faker\Provider\Base;

class IndonesiaWeekdays extends Base
{

  public function indonesianWeekday()
  {
    $weekdays = [
      'Monday' => 'Senin',
      'Tuesday' => 'Selasa',
      'Wednesday' => 'Rabu',
      'Thursday' => 'Kamis',
      'Friday' => 'Jumat',
      'Saturday' => 'Jumat',
      'Sunday' => 'Jumat',
    ];

    // Exclude Saturdays and Sundays
    $excludedDays = ['Saturday', 'Sunday'];
    while (in_array(fake()->dayOfWeek(), $excludedDays)) {
      fake()->dateTimeBetween('-1 day', '+1 day'); // Advance date until a weekday is reached
    }

    return $weekdays[fake()->dayOfWeek()];
  }
}
