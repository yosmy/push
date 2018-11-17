<?php

namespace Yosmy\Push;

/**
 * @di\service()
 */
class CollectUsers
{
    /**
     * @var ManageUserCollection
     */
    private $selectCollection;

    /**
     * @param ManageUserCollection $selectCollection
     */
    public function __construct(ManageUserCollection $selectCollection)
    {
        $this->selectCollection = $selectCollection;
    }

    /**
     * @return Users
     */
    public function collect()
    {
        $cursor = $this->selectCollection
            ->find();

        return new Users($cursor);
    }
}
