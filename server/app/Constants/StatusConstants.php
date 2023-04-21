<?php

namespace App\Constants;

class StatusConstants
{
    # プロジェクトの状態
    public const STATUS = [
        0 => '未設定',
        1 => '予告',
        5 => '作業中',
        8 => '確認待ち',
        10 => '完了',
    ];

    # プロジェクトの状態のバッチ
    public const COLOR = [
        0 => 'badge bg-secondary',
        1 => 'badge bg-warning text-dark',
        5 => 'badge bg-info text-dark',
        8 => 'badge bg-primary',
        10 => 'badge bg-success',
    ];
}
