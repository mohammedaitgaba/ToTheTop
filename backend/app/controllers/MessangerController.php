<?php
use Pusher\Pusher;

require '../vendor/autoload.php';
class MessangerController extends Controller{
    private $messagesmodel;
    private $pusher;
    
        public function __construct()
        {
            $this->messagesmodel = $this->model('Messanger');

            $options = array(
                'cluster' => 'eu',
                'useTLS' => true
            );
            $this->pusher = new Pusher(
                '4ac9543eb3d4fb8af512',
                '5b1ec5ca8796c32eb9b0',
                '1418792',
                $options
              );
        }
    public function tested()
    {
        $data = json_decode(file_get_contents("php://input"));
        // var_dump($data);
        $this->pusher->trigger('my-channel' , 'my-event', ['message' => $data]);
    }

}