<?php

namespace App\Services\Stories;

interface StoryServiceInterface
{
    public function getAllStorys();
    public function getStoryById($id);
    public function createStory(array $data);
    public function updateStory($id, array $data);
    public function deleteStory($id, $userId);
    public function getMyStories($userId);
}
