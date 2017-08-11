<?php

namespace Leftbak\Jira\Facade;

use Illuminate\Support\Facades\Facade;

class JiraFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'jira';
    }

}
