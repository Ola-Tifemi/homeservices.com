<?php
require_once '../classes/ServiceSearch.php';

if (isset($_POST['term'])) {
    $term = $_POST['term'];

    $service = new ServiceSearch;
    $results = $service->search_services($term);

    header('Content-Type: application/json');
    echo json_encode($results);
}




