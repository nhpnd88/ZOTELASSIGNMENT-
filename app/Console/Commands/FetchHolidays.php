<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CalendarificService;
use App\Models\Holiday;

class FetchHolidays extends Command
{
    protected $signature = 'fetch:holidays {country} {year}';
    protected $description = 'Fetch holidays from Calendarific API';

    protected $calendarificService;

    public function __construct(CalendarificService $calendarificService)
    {
        parent::__construct();
        $this->calendarificService = $calendarificService;
    }

    public function handle()
    {
        $country = $this->argument('country');
        $year = $this->argument('year');

        $holidays = $this->calendarificService->getHolidays($country, $year);

        foreach ($holidays as $holiday) {
            Holiday::create([
                'name' => $holiday['name'],
                'date' => $holiday['date']['iso'],
                'type' => implode(', ', $holiday['type'])
            ]);
        }

        $this->info('Holidays fetched and stored successfully.');
    }
}
