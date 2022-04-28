<?php

namespace Webcoms\Datepicker;

use DateTimeInterface;
use Laravel\Nova\Fields\Field;

class Datepicker extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'datepicker';

    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback ?? function ($value) {
            if (!$value instanceof DateTimeInterface) {
                return null;
            }

            return $value->format('d.m.Y');
        });
    }

    public function showWeekNumbers($bool = true)
    {
        return $this->withMeta([__FUNCTION__=> $bool]);
    }

    public function format($format)
    {
        return $this->withMeta([__FUNCTION__=> $format]);
    }

    public function pickerFormat($format)
    {
        return $this->withMeta([__FUNCTION__=> $format]);
    }
}
