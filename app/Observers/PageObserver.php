<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Content;
use App\Models\Page;

class PageObserver
{
    public function deleting(Page $page): void
    {
        Content::where('owner', "page:{$page->slug}")->delete();
    }
}
