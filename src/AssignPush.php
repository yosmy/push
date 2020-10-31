<?php

namespace Yosmy;

/**
 * @di\service()
 */
class AssignPush
{
    /**
     * @var ManagePushCollection
     */
    private $manageUserCollection;

    /**
     * @param ManagePushCollection $manageUserCollection
     */
    public function __construct(
        ManagePushCollection $manageUserCollection
    ) {
        $this->manageUserCollection = $manageUserCollection;
    }

    /**
     * @param string $user
     * @param string $token
     */
    public function assign(
        string $user,
        string $token
    ) {
        // Remove previous user in the same device
        $this->manageUserCollection
            ->deleteMany([
                'token' => $token
            ]);

        $updateResult = $this->manageUserCollection
            ->updateOne(
                [
                    '_id' => $user
                ],
                [
                    '$set' => [
                        'token' => $token,
                    ]
                ]
            );

        if ($updateResult->getMatchedCount() == 0) {
            $this->manageUserCollection->insertOne([
                '_id' => $user,
                'token' => $token,
            ]);
        }
    }
}
