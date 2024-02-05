<?php

include("./model.php");

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['msg'])) {
    $obj = [
        'msg' => '',
        'errName' => '',
        'errEmail' => '',
        'errZinojums' => ''
    ];
    if (empty($_POST['name'])) {
        $obj['errName'] = "Name input is empty!";
    }
    if (empty($_POST['email'])) {
        $obj['errEmail'] = "Email input is empty!";
    }
    if (empty($_POST['msg'])) {
        $obj['errZinojums'] = "Msg input is empty!";
    }
    if (empty($obj['errName']) && empty($obj['errEmail']) && empty($obj['errZinojums'])) {

        $objekts = new post;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];
        $sql = $objekts->insert($name, $email, $msg); // Corrected variable name
        if ($sql) {
            $obj['msg'] = 'Added successfully!';
        } else {
            $obj['msg'] = 'Creation failed!';
        }
    }

    echo json_encode($obj);
}

function output(){
    $objekts = new post;
    $user = $objekts->output();

    $output = [
        "output" => $user
    ];

    return $output;
}  

function sortEntries($column) {
    $objekts = new post;
    $sortedData = $objekts->sortEntries($column);

    $output = [
        "output" => $sortedData
    ];

    return $output;
}
?>
