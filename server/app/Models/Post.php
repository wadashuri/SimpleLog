<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // ========================================================================

    /**
     * リレーション設定
     */
    public function master()
    {
        return $this->belongsTo(Master::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // ========================================================================

    /**
     * 呼び出し関数
     */

    # 番号で画像を取得
    public function image($type)
    {
        $image = false;
        $disk = Storage::disk('local');

        $directory = 'public/post/' . $this->id . '/' . $type . '.png';

        if ($disk->exists($directory)) {
            // ファイルの最終更新日の取得
            $file_time = filemtime($disk->path($directory));
            $image = $disk->url($directory) . '?' . $file_time;
        }

        return $image;
    }
}
