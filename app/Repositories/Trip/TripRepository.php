<?php namespace App\Repositories\Trip;

interface TripRepository
{
    
    public function getAll();

    public function getTripsByUser($user);
}
