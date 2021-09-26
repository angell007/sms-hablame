<?php

namespace Danilo\SmsHablame;

use Illuminate\Support\Facades\Facade as BaseFacade;


class SmsHablame extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'hablame';
    }
}
