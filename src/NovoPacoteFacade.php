<?php

namespace I9w3b\NovoPacote;

use Illuminate\Support\Facades\Facade;

class NovoPacoteFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'novo-pacote';
    }
}
