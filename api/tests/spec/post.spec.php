<?php

namespace Blog\Spec;

use Blog\Models\Posts;
use Blog\Models\PostsQuery;

describe("Creating a post", function() {

    it('should return an object of type Blog\Models\Users', function() use($username, $password, &$result) {
        expect($result)->toBeA('object');
    });

    it('should have a username equal to the previously generated username', function() use(&$result, $username) {
        expect($result->getUsername())->toEqual($username);
    });

    it('should return a hashed password that can be verified by using password_verify', function() use(&$result, $password) {
        expect(password_verify($password, $result->getPassword()))->toEqual(true);
    });

    $user->delete();
});