<?php

namespace App\Repositories\Participants;
use App\Models\Participant;

class ParticipantRepository implements ParticipantRepositoryInterface
{
    protected $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }
    public function all()
    {
        return $this->participant->all();
    }
    public function find($id)
    {
        return $this->participant->find($id);
    }
    public function create(array $data)
    {
        return $this->participant->create($data);
    }
    public function update($id, array $data)
    {
        return $this->participant->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->participant->find($id)->delete();
    }
}