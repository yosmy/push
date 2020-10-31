<?php

namespace Yosmy;

/**
 * @di\service()
 */
class CollectPushes
{
    /**
     * @var ManagePushCollection
     */
    private $selectCollection;

    /**
     * @param ManagePushCollection $selectCollection
     */
    public function __construct(ManagePushCollection $selectCollection)
    {
        $this->selectCollection = $selectCollection;
    }

    /**
     * @return Pushes
     */
    public function collect(): Pushes
    {
        $cursor = $this->selectCollection
            ->find();

        return new Pushes($cursor);
    }
}
