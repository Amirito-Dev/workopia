<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    $title = "Available Jobs";
    $jobs = [
        'Web Developer',
        'Database Admin',
        'Software Engineer',
        'System Analyst'
    ];

    return view('jobs.index', [
        'title' => $title,
        'jobs' => $jobs
    ]);
})->name('jobs');

Route::get('/jobs/create', function () {
    return view('jobs.create');
})->name('jobs.create');
