<?php

namespace App\Repositories\Conversation;
use App\Models\Conversation;

class ConversationRepository implements ConversationRepositoryInterface
{
    protected $conversation;

    public function __construct(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }
    public function all()
    {
        return $this->conversation->all();
    }
    public function find($id)
    {
        return $this->conversation->find($id);
    }
    public function create(array $data)
    {
        return $this->conversation->create($data);
    }
    public function update($id, array $data)
    {
        return $this->conversation->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->conversation->find($id)->delete();
    }
}