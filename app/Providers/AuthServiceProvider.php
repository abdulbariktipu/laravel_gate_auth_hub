<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\Form;
use App\Models\User;

use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class, // PostPolicy কে রেজিস্টার
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //এ আমরা পোস্ট তৈরি কারী ইউজার নিজেকে , এবং যাদের role Editor এবং Admin তাদেরকে আপডেট এর সুযোগ দিয়েছি।
        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->role === 'Editor' || $user->role === 'Admin';
        });        
        // এ শুধু মাত্র ইউজার নিজেকে এবং যার role Admin তাকে delete করার অনুমতি দিয়েছি।
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id || $user->role === 'Admin';
        });

        //এ আমরা পোস্ট তৈরি কারী ইউজার নিজেকে , এবং যাদের role Editor এবং Admin তাদেরকে আপডেট এর সুযোগ দিয়েছি।
        Gate::define('update-form', function (User $user, Form $form) {
            return $user->id === $form->user_id || $user->role === 'Editor' || $user->role === 'Admin';
        });
        // এ শুধু মাত্র ইউজার নিজেকে এবং যার role Admin তাকে delete করার অনুমতি দিয়েছি।
        Gate::define('delete-form', function (User $user, Form $form) {
            return $user->id === $form->user_id || $user->role === 'Admin';
        });

        // can page view permission
        Gate::define('page-view', function (User $user) {
            return $user->role === 'Editor' || $user->role === 'Admin';
        });

        // এখানে, আমরা আমাদের Gate subscriber-only নাম দিয়েছি। এটি আমাদের ইউজার ডিটেলস পাবে। পরবর্তী জিনিসটি হল আমাদের ইউজাররা যদি subscribe না করে থাকে তবে তাদের সামগ্রীতে অ্যাক্সেস থেকে সীমাবদ্ধ করা।
        Gate::define('subscriber-only', function($user) {
            If ($user->subscribe ==1) {
                return true;
            }
            return false;
        });
    }
}
