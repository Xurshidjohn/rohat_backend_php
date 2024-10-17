<?php
    use App\Models\Message;
    include(__DIR__."/vendor/autoload.php");
    include(__DIR__."/bootstrap.php");
    include(__DIR__."/Models/Message.php");

    // $messages = Message::find(1);

    if(isset($_GET['action'])) {
        if($_GET['action'] == 'display') {
            $messages = Message::all();
            echo json_encode([
                'status' => 'success',
                'message' => 'All Messages Successfully displayed.',
                'data' => $messages,
            ]);
        } else if($_GET['action'] == 'insert') {
            if(isset($_GET['sender_name']) && isset($_GET['sender_number']) && isset($_GET['desc'])) {
                if($_GET['sender_name'] != '' && $_GET['sender_number'] != '' && $_GET['desc'] != '') {
                $sender_name = $_GET['sender_name'];
                $sender_number = $_GET['sender_number'];
                $sender_desc = $_GET['desc'];

                $message = new Message;
                $message->sender_name = $sender_name;
                $message->sender_number = $sender_number;
                $message->desc = $sender_desc;
                $message->save();

                if($message) {
                    echo json_encode(
                        [
                            'status' => 'success',
                            'message' => 'Message Successfully Inserted.',
                            'data' => $message,
                        ]
                        );
                }
            }else {
                echo json_encode(
                    [
                        'status' => 'unsuccess',
                        'message' => 'Please Enter all fields and try again',
                        'data' => null,
                    ]
                    );
            }}
        } else if($_GET['action'] == 'delete') {
            if(isset($_GET['id'])) {
                $input_id = $_GET['id'];
                $message = Message::find($input_id)->delete();

                if($message) {
                    echo json_encode(
                        [
                            'status' => 'success',
                            'message' => 'Message Successfully Deleted.'
                        ]
                        );
                }
            }
        }
    } else {
        echo "<pre>/index.php?action={method}";
    }

?>