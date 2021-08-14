<?php
namespace App\Repositories\Interfaces\Api;

interface SubscribeProgramInterface
{
    public function subscribe(array $data, $id);
}
