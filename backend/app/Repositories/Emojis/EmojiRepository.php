<?php

namespace App\Repositories\Emojis;
use App\Models\Emoji;

class EmojiRepository implements EmojiRepositoryInterface
{
    protected $emoji;

    public function __construct(Emoji $emoji)
    {
        $this->emoji = $emoji;
    }
    public function all()
    {
        return $this->emoji->all();
    }
    public function find($id)
    {
        return $this->emoji->find($id);
    }
    public function create(array $data)
    {
        return $this->emoji->create($data);
    }
    public function update($id, array $data)
    {
        return $this->emoji->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->emoji->find($id)->delete();
    }
}