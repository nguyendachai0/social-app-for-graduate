<?php

namespace App\Services\Participants;

interface ParticipantServiceInterface 
{
    public function getAllParticipants();
    public function getParticipantById($id);
    public function createParticipant(array $data);
    public function updateParticipant($id, array $data);
    public function deleteParticipant($id);
}