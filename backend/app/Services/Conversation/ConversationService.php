<?php
namespace App\Services\Conversation;

use App\Repositories\Conversation\ConversationRepositoryInterface;

class ConversationService implements ConversationServiceInterface
{
    private $conversationRepository;

    public function __construct(ConversationRepositoryInterface $conversationRepository)
    {
        $this->conversationRepository = $conversationRepository;
    }
    public function getAllConversations()
    {
        return $this->conversationRepository->all();
    }
    public function getConversationById($id)
    {
        return $this->conversationRepository->find($id);
    }
    public function createConversation(array $data)
    {
        return $this->conversationRepository->create($data);
    }
    public function updateConversation($id, array $data)
    {
        return $this->conversationRepository->update($id,  $data);
    }
    public function deleteConversation($id)
    {
        return $this->conversationRepository->delete($id);
    }

}