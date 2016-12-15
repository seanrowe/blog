<?php

namespace Blog\Models;

use Blog\Models\Base\UsersQuery as BaseUsersQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'users' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class UsersQuery extends BaseUsersQuery
{
    public static function findByLogin(string $username, string $password): Users
    {
        $user = UsersQuery::create()
            ->filterByUsername($username)
            ->findOne();

        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }

        return null;
    }
}
