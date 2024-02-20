<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class SyncViewCount extends Command
{
    protected $signature = 'app:sync-view-count';

    protected $description = 'Command description';

    protected $models = [
        Article::class,
    ];

    public function handle()
    {
        collect($this->models)->each(function ($model) {
            $views = $model::select('id')->pluck('id')->map(function ($id) use ($model) {
                return [
                    'id' => $id,
                    'view_count' => Redis::pfcount(sprintf('%s.%s.views', (new $model())->getTable(), $id)),
                ];
            })->toArray();

            batch()->update(new $model(), $views, 'id');
        });

    }
}
