<?php

namespace Mlantz\Quarx\Facades;

use Illuminate\Support\Facades\Facade;

class QuarxServiceFacade extends Facade
{

    protected static function getFacadeAccessor() { return 'QuarxService'; }

}