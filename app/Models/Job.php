<?php 

namespace App\Models;

class Job
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ],
        ];
    }

    public static function find($id)
    {
        $job = \Illuminate\Support\Arr::first(
            static::all(),
            fn($job) => $job['id'] == $id
        );

        if (! $job) {
            abort(404);
        }

        return $job;
    }
}
