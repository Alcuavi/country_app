<?php

namespace App\Command;

use App\Entity\Country;
use App\Service\CountryApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class LoadCountriesCommand extends Command
{
    protected static $defaultName = 'app:load-countries';

    private $countryApiService;
    private $entityManager;

    public function __construct(CountryApiService $countryApiService, EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->countryApiService = $countryApiService;
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('Load countries data from RestCountries API')
            ->setHelp('This command allows you to load countries data from the RestCountries API into your database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $countriesData = $this->countryApiService->fetchCountries();
        $countryRepository = $this->entityManager->getRepository(Country::class);

        foreach ($countriesData as $countryData) {
            $countryCode = $countryData['cca3'] ?? null;
            if (!$countryCode) {
                continue;
            }

            // Buscar si el país ya existe en la base de datos
            $country = $countryRepository->findOneBy(['code' => $countryCode]);

            if (!$country) {
                $country = new Country();
                $country->setCode($countryCode);
            }

            $country->setName($countryData['name']['common']);
            $country->setPopulation($countryData['population'] ?? null);
            $country->setFlag($countryData['flags']['png'] ?? null);
            $country->setRegion($countryData['region'] ?? null);
            $country->setSubregion($countryData['subregion'] ?? null);
            $country->setCapital($countryData['capital'][0] ?? null);
            $country->setArea($countryData['area'] ?? null);
            $country->setLanguages($countryData['languages'] ?? []);
            $country->setBorders($countryData['borders'] ?? []);

            // Procesar nativeName
            if (isset($countryData['name']['nativeName']) && is_array($countryData['name']['nativeName'])) {
                $nativeName = reset($countryData['name']['nativeName']);
                if (is_array($nativeName) && isset($nativeName['common'])) {
                    $country->setNativeName($nativeName['common']);
                } else {
                    $country->setNativeName(null);
                }
            } else {
                $country->setNativeName(null);
            }

            $country->setNumericCode($countryData['numericCode'] ?? null);
            $country->setCurrencies($countryData['currencies'] ?? []);
            $country->setTimezones($countryData['timezones'] ?? []);

            $this->entityManager->persist($country);
        }

        $this->entityManager->flush();

        $io->success('Countries data has been loaded successfully.');

        return Command::SUCCESS;
    }
}
