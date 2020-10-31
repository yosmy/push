<?php

namespace Yosmy;

use MongoDB\Model\BSONDocument;

class BasePush extends BSONDocument implements Push
{
    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->offsetGet('_id');
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->offsetGet('token');
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): object
    {
        $data = parent::jsonSerialize();

        $data->user = $data->_id;

        unset($data->_id);

        return $data;
    }
}
