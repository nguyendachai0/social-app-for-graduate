<?php

namespace App\Services\Stories;

use App\Repositories\Stories\StoryRepositoryInterface;

class StoryService implements StoryServiceInterface
{
    private $storyRepository;

    public function __construct(StoryRepositoryInterface $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }
    public function getAllStorys()
    {
        return $this->storyRepository->all();
    }
    public function getStoryById($id)
    {
        return $this->storyRepository->find($id);
    }
    public function createStory(array $data)
    {
        return $this->storyRepository->create($data);
    }
    public function updateStory($id, array $data)
    {
        return $this->storyRepository->update($id,  $data);
    }
    public function deleteStory($id,  $userId)
    {
        return $this->storyRepository->delete($id, $userId);
    }
    public function getMyStories($userId)
    {
        return $this->storyRepository->myStories($userId);
    }
}
