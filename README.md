# Nova Datepicker
A datepicker field with week numbers for Laravel Nova using flatpickr.

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require webcoms/nova-datepicker
```

## Usage

Now you can use the Datepicker Field with Nova. Make the Datepicker in the `fields` method like any other field in a `Resource`. Add `showWeekNumbers()` to display week numbers in the calendar.

```php
// in a Nova Resource

use WebcomMedia\Datepicker\Datepicker;

public function fields(Request $request)
{
    return [
        Datepicker::make('Deliverable at', 'deliverable_at')
            ->showWeekNumbers(),
    ]
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
