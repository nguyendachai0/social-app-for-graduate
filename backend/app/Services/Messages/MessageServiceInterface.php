<?php

namespace App\Services\Messages;

interface MessageServiceInterface 
{
    public function getAllMessages();
    public function getMessageById($id);
    public function createMessage(array $data);
    public function updateMessage($id, array $data);
    public function deleteMessage($id);
}