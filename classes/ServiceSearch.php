<?php

class ServiceSearch {
    private $data;

    public function __construct() {
        // You can replace this with a DB connection/query
        $this->data = [
            'Texas' => ['Plumber', 'Electrician'],
            'California' => ['Dentist', 'Mechanic'],
            'Florida' => ['Hairdresser', 'Electrician'],
            'New York' => ['Artist', 'Plumber'],
        ];
    }

    public function search($query) {
        $query = strtolower($query);
        $results = [];

        foreach ($this->data as $state => $services) {
            foreach ($services as $service) {
                if (
                    strpos(strtolower($service), $query) !== false ||
                    strpos(strtolower($state), $query) !== false
                ) {
                    $results[] = [
                        'state' => $state,
                        'service' => $service
                    ];
                }
            }
        }

        return $results;
    }
}
