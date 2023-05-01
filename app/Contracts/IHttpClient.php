<?php

namespace App\Contracts;
interface IHttpClient
{

    function httpGet(string $url);

}
