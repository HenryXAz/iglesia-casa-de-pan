<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FoodProduct;
use App\Models\Post;
use App\Models\SpecialEvent;
use App\Models\SpecialEventSubscription;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $activeUsers = User::where('is_active', true)->count();
        $inactiveUsers = User::where('is_active', false)->count();
        $unVerificationUsers = User::where('email_verified_at', null)->count();

        $posts = Post::count();
        $publishedPosts = Post::where('is_published', true)->count();
        $unPublishedPosts = Post::where('is_published', false)->count();

        $events = SpecialEvent::count();
        $activeEvents = SpecialEvent::where('is_published', true)->count();

        $foodProducts = FoodProduct::count();
        $activeFoodProducts = FoodProduct::where('is_finalized', false)->where('is_published', true)->count();
        $unauthorizedFoodProducts = FoodProduct::where('is_published', false)->count();

        return view('pages.dashboard.index',
            compact('users', 'activeUsers', 'inactiveUsers', 'unVerificationUsers','posts', 'publishedPosts', 'unPublishedPosts', 'events', 'activeEvents', 'foodProducts', 'activeFoodProducts', 'unauthorizedFoodProducts'));
    }
}
