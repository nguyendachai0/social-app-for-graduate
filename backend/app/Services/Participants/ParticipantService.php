<?php
namespace App\Services\Participants;

use App\Repositories\Participants\ParticipantRepositoryInterface;

class ParticipantService implements ParticipantServiceInterface
{
    private $profileUserRepository;

    public function __construct(ParticipantRepositoryInterface $profileUserRepository)
    {
        $this->profileUserRepository = $profileUserRepository;
    }
    public function getAllParticipants()
    {
        return $this->profileUserRepository->all();
    }
    public function getParticipantById($id)
    {
        return $this->profileUserRepository->find($id);
    }
    public function createParticipant(array $data)
    {
        return $this->profileUserRepository->create($data);
    }
    public function updateParticipant($id, array $data)
    {
        return $this->profileUserRepository->update($id,  $data);
    }
    public function deleteParticipant($id)
    {
        return $this->profileUserRepository->delete($id);
    }

}