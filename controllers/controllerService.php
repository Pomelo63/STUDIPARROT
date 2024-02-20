<?php

require_once './models/service.php';

class ControllerService
{
    private Service $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    public function getServices()
    {
        try {
            $services = $this->service->getServices();
            $result = $services->fetchAll(\PDO::FETCH_ASSOC);
            $result = array('services' => $result);
            return $result;
        } catch (Exception $e) {
            $fakearray = array();
            $result = array('services' => $fakearray);
            return $result;
        }
    }

    public function deleteService(int $id)
    {
        try {
            $deletService = $this->service->deleteService($id);
            $code = http_response_code(200);
            echo $code;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addNewService(string $serviceType, string $serviceName)
    {
        try {
            $addService = $this->service->addNewService($serviceType, $serviceName);
            $code = http_response_code(200);
            echo $code;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
