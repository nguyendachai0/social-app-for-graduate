<?php

namespace App\Repositories\Stories;
use App\Models\Story;

class StoryRepository implements StoryRepositoryInterface
{
    protected $story;

    public function __construct(Story $story)
    {
        $this->story = $story;
    }
    public function all()
    {
        return $this->story->all();
    }
    public function find($id)
    {
        return $this->story->find($id);
    }
    public function create(array $data)
    {
        return $this->story->create($data);
    }
    public function update($id, array $data)
    {
        return $this->story->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->story->find($id)->delete();
    }
}