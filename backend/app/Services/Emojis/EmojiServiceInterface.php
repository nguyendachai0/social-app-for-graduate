<?php

namespace App\Services\Emojis;

interface EmojiServiceInterface 
{
    public function getAllEmojis();
    public function getEmojiById($id);
    public function createEmoji(array $data);
    public function updateEmoji($id, array $data);
    public function deleteEmoji($id);
}