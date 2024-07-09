<?php
namespace App\Services\Messages;

use App\Repositories\Messages\MessageRepositoryInterface;

class MessageService implements MessageServiceInterface
{
    private $messageRepository;

    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }
    public function getAllMessages()
    {
        return $this->messageRepository->all();
    }
    public function getMessageById($id)
    {
        return $this->messageRepository->find($id);
    }
    public function createMessage(array $data)
    {
        return $this->messageRepository->create($data);
    }
    public function updateMessage($id, array $data)
    {
        return $this->messageRepository->update($id,  $data);
    }
    public function deleteMessage($id)
    {
        return $this->messageRepository->delete($id);
    }

}