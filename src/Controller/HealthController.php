<?php


namespace polvanovv\HealthCheckBundle\Controller;


use polvanovv\HealthCheckBundle\Entity\HealthInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HealthController extends AbstractController
{
    private $healthServices = [];

    public function addHealthService(HealthInterface $healthInterface)
    {
        $this->healthServices[] = $healthInterface;
    }

    /**
     * @Route("/health")
     * @return JsonResponse
     */
    public function getHealth(): JsonResponse
    {
        return $this->json(array_map(function (HealthInterface $healthService) {
            $info = $healthService->getHealthInfo();

            return [
                'name' => $healthService->getName(),
                'info' => [
                    'status' => $info->getStatus(),
                    'additional_info' => $info->getAdditionalInfo(),
                ]
            ];
            }, $this->healthServices));
    }
}