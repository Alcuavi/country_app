<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\KernelInterface;

class LoadController extends AbstractController
{
    #[Route('/load-countries', name: 'app_country_load', methods: ['GET'])]
    public function loadCountries(KernelInterface $kernel): Response
    {
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'app:load-countries',
        ]);

        $output = new BufferedOutput();
        $application->run($input, $output);

        $content = $output->fetch();

        //return new Response("<pre>$content</pre>");
        return $this->redirectToRoute('app_country_index');
    }
}
