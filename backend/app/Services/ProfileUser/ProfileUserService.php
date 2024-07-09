<?php
namespace App\Services\ProfileUser;

use App\Repositories\ProfileUser\ProfileUserRepositoryInterface;

class ProfileUserService implements ProfileUserServiceInterface
{
    private $profileUserRepository;

    public function __construct(ProfileUserRepositoryInterface $profileUserRepository)
    {
        $this->profileUserRepository = $profileUserRepository;
    }
    public function getAllProfileUsers()
    {
        return $this->profileUserRepository->all();
    }
    public function getProfileUserById($id)
    {
        return $this->profileUserRepository->find($id);
    }
    public function createProfileUser(array $data)
    {
        return $this->profileUserRepository->create($data);
    }
    public function updateProfileUser($id, array $data)
    {
        return $this->profileUserRepository->update($id,  $data);
    }
    public function deleteProfileUser($id)
    {
        return $this->profileUserRepository->delete($id);
    }

}