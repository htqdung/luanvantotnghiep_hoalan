<?php

namespace App\Events;

use App\SanPham;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ViewProducts
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $sanpham;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(SanPham $sanpham)
    {
        $this->sanpham = $sanpham;
    }

}
