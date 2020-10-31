<?php

namespace Yosmy;

interface Push
{
    /**
     * @return string
     */
    public function getUser(): string;

    /**
     * @return string
     */
    public function getToken(): string;
}
