<?php

namespace App\Controller;

use App\Entity\Country;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountryDeleteController extends AbstractController
{
    #[Route('/delete-multiple', name: 'app_country_delete_multiple', methods: ['POST'])]
    public function deleteMultiple(Request $request, EntityManagerInterface $entityManager): Response
    {
        $countryIds = $request->request->all('country_ids', []);

        if (!empty($countryIds)) {
            $countries = $entityManager->getRepository(Country::class)->findBy(['id' => $countryIds]);
            foreach ($countries as $country) {
                $entityManager->remove($country);
            }
            $entityManager->flush();

            $this->addFlash('success', 'Selected countries have been deleted successfully.');
        } else {
            $this->addFlash('error', 'No countries selected for deletion.');
        }

        return $this->redirectToRoute('app_country_index');
    }
}
