<?php

namespace Yosmy;

/**
 * @di\service()
 */
class PickPush
{
    /**
     * @var ManagePushCollection
     */
    private $manageUserCollection;

    /**
     * @param ManagePushCollection $manageUserCollection
     */
    public function __construct(ManagePushCollection $manageUserCollection)
    {
        $this->manageUserCollection = $manageUserCollection;
    }

    /**
     * @param string $user
     *
     * @return Push
     *
     * @throws NonexistentPushException
     */
    public function pick(
        string $user
    ): Push {
        /** @var Push $push */
        $push = $this->manageUserCollection
            ->findOne([
                '_id' => $user
            ]);

        if (!$push) {
            throw new NonexistentPushException();
        }

        return $push;
    }
}
