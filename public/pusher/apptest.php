<?php
  require __DIR__ . '/vendor/autoload.php';

  //echo __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'ap2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '389d667a3d4a50dc91a6',
    'e1f2e0266903857072be',
    '1309578',
    $options
  );

  /*$data['message'] = 'hello websocket';

  $pusher->trigger('my-channel', 'my-event', $data);*/

  $turvy['message'] = 'check booking request';
  $turvy['userId'] = '123';
  $pusher->trigger('turvy-channel', 'rider_cancel_booking_event', $turvy)
?>
