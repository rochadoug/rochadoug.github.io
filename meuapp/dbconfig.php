<?php
require_once 'vendor/autoload.php';
use Google\Cloud\Firestore\FirestoreClient;

$projectid = 'bibliaquiz-konvict2024';

$fireDb = new FirestoreClient(['projectId' => $projectid]);

?>