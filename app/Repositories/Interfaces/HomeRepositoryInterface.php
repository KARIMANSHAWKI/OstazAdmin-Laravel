<?php
namespace App\Repositories\Interfaces;

interface HomeRepositoryInterface
{
    public function getCategoryTrainers();

    public function getProgramsCount();

    public function getStudentCount();
}
