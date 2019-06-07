<?php

  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Credit.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();
  // Instantiate blog category object
  $credit = new Credit($db);

  // Get ID
  $credit->credit_id = isset($_GET['credit_id']) ? $_GET['credit_id'] : die();

  // Get post
  $credit->read_single();

  // Create array
  $credit_arr = array(
    'credit_id' => $credit->credit_id,
    'username' => $caredit->username
  );

  // Make JSON
  print_r(json_encode($credit_arr));
