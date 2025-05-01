<?php
require_once '../classes/ServiceSearch.php';

header('Content-Type: application/json');

if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $search = new ServiceSearch();
    $results = $search->search($query);
    echo json_encode($results);
} else {
    echo json_encode([]);
}



