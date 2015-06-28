<?php namespace HustleWorks\DateLists;

use Illuminate\Support\Facades\Facade;

class DateListsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'datelists';
    }
}
