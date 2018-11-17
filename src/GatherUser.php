<?php

namespace Yosmy\Push;

/**
 * @di\service()
 */
class GatherUser
{
    /**
     * @var ManageUserCollection
     */
    private $manageUserCollection;

    /**
     * @param ManageUserCollection $manageUserCollection
     */
    public function __construct(ManageUserCollection $manageUserCollection)
    {
        $this->manageUserCollection = $manageUserCollection;
    }

    /**
     * @param string $id
     *
     * @return User
     */
    public function gather(
        string $id
    ) {
        /** @var User $user */
        $user = $this->manageUserCollection
            ->findOne([
                '_id' => $id
            ]);

        return $user;
    }
}
