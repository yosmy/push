<?php

namespace Yosmy\Push;

use MongoDB\UpdateResult;

/**
 * @di\service()
 */
class AssignUser
{
    /**
     * @var ManageUserCollection
     */
    private $manageUserCollection;

    /**
     * @param ManageUserCollection $manageUserCollection
     */
    public function __construct(
        ManageUserCollection $manageUserCollection
    ) {
        $this->manageUserCollection = $manageUserCollection;
    }

    /**
     * @param string $id
     * @param string $push
     */
    public function assign(
        string $id,
        string $push
    ) {
        // Remove previous user in the same device
        $this->manageUserCollection
            ->deleteMany([
                'push' => $push
            ]);

        /** @var UpdateResult $updateResult */
        $updateResult = $this->manageUserCollection
            ->updateOne(
                [
                    '_id' => $id
                ],
                [
                    '$set' => [
                        'push' => $push,
                    ]
                ]
            );

        if ($updateResult->getMatchedCount() == 0) {
            $this->manageUserCollection->insertOne([
                '_id' => $id,
                'push' => $push,
            ]);
        }
    }
}
