<?php
namespace App\Services\Emojis;

use App\Repositories\Emojis\EmojiRepositoryInterface;

class EmojiService implements EmojiServiceInterface
{
    private $emojiRepository;

    public function __construct(EmojiRepositoryInterface $emojiRepository)
    {
        $this->emojiRepository = $emojiRepository;
    }
    public function getAllEmojis()
    {
        return $this->emojiRepository->all();
    }
    public function getEmojiById($id)
    {
        return $this->emojiRepository->find($id);
    }
    public function createEmoji(array $data)
    {
        return $this->emojiRepository->create($data);
    }
    public function updateEmoji($id, array $data)
    {
        return $this->emojiRepository->update($id,  $data);
    }
    public function deleteEmoji($id)
    {
        return $this->emojiRepository->delete($id);
    }

}