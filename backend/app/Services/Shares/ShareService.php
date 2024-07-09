<?php
namespace App\Services\Shares;

use App\Repositories\Shares\ShareRepositoryInterface;

class ShareService implements ShareServiceInterface
{
    private $shareRepository;

    public function __construct(ShareRepositoryInterface $shareRepository)
    {
        $this->shareRepository = $shareRepository;
    }
    public function getAllShares()
    {
        return $this->shareRepository->all();
    }
    public function getShareById($id)
    {
        return $this->shareRepository->find($id);
    }
    public function createShare(array $data)
    {
        return $this->shareRepository->create($data);
    }
    public function updateShare($id, array $data)
    {
        return $this->shareRepository->update($id,  $data);
    }
    public function deleteShare($id)
    {
        return $this->shareRepository->delete($id);
    }

}