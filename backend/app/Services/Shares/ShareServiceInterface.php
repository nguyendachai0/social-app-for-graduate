<?php

namespace App\Services\Shares;

interface ShareServiceInterface 
{
    public function getAllShares();
    public function getShareById($id);
    public function createShare(array $data);
    public function updateShare($id, array $data);
    public function deleteShare($id);
}