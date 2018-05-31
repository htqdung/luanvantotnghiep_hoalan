<?php

namespace App\Listeners;

use App\Events\Event;
use App\Events\ViewProducts;
use App\SanPham;
use Illuminate\Contracts\Queue\Queue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;

class ProductListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public $timeStop = 1800;

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(ViewProducts $product)
    {
        $id = $product->sanpham->id;
//        \Session::forget('view');
        $flag = 0;
        if (\Session::exists('view'))
        {
            $view = \Session::get('view');

            if ( array_key_exists($id,$view['product']))
            {
                $time = time();
                // check time  neu  tru time am thi tao moi
                // duong thi thoi

                $view = \Session::get('view');
                $viewProduct = $view['product'][$id];

                if (($viewProduct['time'] + $this->timeStop ) > $time === false) {
                    // tang view
                    // update lai time
                    $flag = 1;
                    $view['product'][$id] = ['time' => time() ];
                    \Session::put('view',$view);
                }

            }else{

                $view['product'][$id] = ['time' => time() ];
                \Session::put('view',$view);
                $flag = 1;
            }
        }else {

            $view['product'][$id] = ['time' => time() ];
            \Session::put('view',$view);
            $flag = 1;
        }

        if ($flag == 1) $this->addViewProduct($id);
    }

    public function addViewProduct($id)
    {
        $product = SanPham::find($id);
        $product->so_luot_xem += 1;
        $product->save();
    }
}
