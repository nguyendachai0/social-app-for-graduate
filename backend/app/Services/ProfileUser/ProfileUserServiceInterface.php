<?php

namespace App\Services\ProfileUser;

interface ProfileUserServiceInterface 
{
    public function getAllProfileUsers();
    public function getProfileUserById($id);
    public function createProfileUser(array $data);
    public function updateProfileUser($id, array $data);
    public function deleteProfileUser($id);
}