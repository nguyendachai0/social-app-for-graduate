<?php

namespace App\Repositories\Stories;

interface StoryRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id, $userId);
    public function myStories($userId);
}
