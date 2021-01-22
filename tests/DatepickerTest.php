<?php

namespace Webcoms\Datepicker\Tests;

use Webcoms\Datepicker\Datepicker;

class DatepickerTest extends TestCase
{
    protected $datepicker;

    public function setUp(): void
    {
        parent::setUp();

        $this->datepicker = new Datepicker('Field', 'field');
    }

    /** @test */
    public function show_week_numbers()
    {
        $this->datepicker->showWeekNumbers();

        $this->assertContains('showWeekNumbers', $this->datepicker->meta);
        $this->assertTrue(true, $this->datepicker->meta['showWeekNumbers']);
    }

    /** @test */
    public function date_format_in_input_field()
    {
        $this->datepicker->format('d.m.Y');

        $this->assertKeyExists('format', $this->datepicker->meta);
        $this->assertEquals('d.m.Y', $this->datepicker->meta['format']);
    }
}
