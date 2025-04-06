<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class ExpireVerificationCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function handle()
    {
        $user = User::find($this->userId);

        if ($user && $user->sent_at) {
            $sentAt = Carbon::parse($user->sent_at);  // Convert sent_at to Carbon object

            if ($sentAt->diffInSeconds(now()) > 60) {  // Kiểm tra hết hạn sau 60 giây
                // Hủy mã xác thực sau 1 phút
                $user->update([
                    'verification_code' => null,
                    'sent_at' => null
                ]);
            }
        }
    }
}
