<?php

namespace App\Policies;

use App\Models\News;
use App\Models\User;

class NewsPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('news.manage');
    }

    public function view(User $user, News $news): bool
    {
        return $user->can('news.manage');
    }

    public function create(User $user): bool
    {
        return $user->can('news.manage');
    }

    public function update(User $user, News $news): bool
    {
        return $user->can('news.manage');
    }

    public function delete(User $user, News $news): bool
    {
        return $user->can('news.manage');
    }

    public function restore(User $user, News $news): bool
    {
        return false;
    }

    public function forceDelete(User $user, News $news): bool
    {
        return false;
    }
}
