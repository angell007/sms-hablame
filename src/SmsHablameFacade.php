<?php

namespace Danilo\SmsHablame;

use Illuminate\Support\Facades\Facade as BaseFacade;


class SmsHablameFacade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sms-hablame';
    }
}
