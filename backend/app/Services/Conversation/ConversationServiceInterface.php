<?php

namespace App\Services\Conversation;

interface ConversationServiceInterface 
{
    public function getAllConversations();
    public function getConversationById($id);
    public function createConversation(array $data);
    public function updateConversation($id, array $data);
    public function deleteConversation($id);
}