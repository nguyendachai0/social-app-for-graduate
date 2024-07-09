<?php

namespace App\Repositories\Messages;
use App\Models\Message;

class MessageRepository implements MessageRepositoryInterface
{
    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function all()
    {
        return $this->message->all();
    }
    public function find($id)
    {
        return $this->message->find($id);
    }
    public function create(array $data)
    {
        return $this->message->create($data);
    }
    public function update($id, array $data)
    {
        return $this->message->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->message->find($id)->delete();
    }
}