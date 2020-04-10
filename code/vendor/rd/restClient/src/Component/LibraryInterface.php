<?php

namespace RestClient\Component;

use RestClient\Component\Http\Request;

interface LibraryInterface
{
    public function sendRequest(Request $request) : array;
}
