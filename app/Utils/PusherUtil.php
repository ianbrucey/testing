<?php


namespace App\Utils;


class PusherUtil
{
    private $options;

    public $pusher;

    public function __construct()
    {
        $this->options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => env('APP_ENV') == "production" ? true : false
        );

        $this->pusher = new Pusher\Pusher(
            '33e7d617b56a136576e5',
            'fdf58abc1d26ed5bc4fc',
            '1157941',
            $this->opti
        );
    }

    public function emit($data) {
        $this->pusher->trigger('my-channel', 'my-event', $data);
    }






}
