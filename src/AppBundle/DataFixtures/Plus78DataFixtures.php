<?php
namespace AppBundle\DataFixtures;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class Plus78DataFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $file = '/var/www/symfony-app/web/plus78/SiteData.xml';
        $ch = curl_init();
        $url = "http://test.plus78.ru/xml/SiteData.xml";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array('Content-type: application/xml')); // Assuming you're requesting XML
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        $f = fopen($file, 'w');
        fwrite($f, $response);
        fclose($f);

        $sql = "use myproject;
LOAD XML LOCAL INFILE '/var/www/symfony-app/web/plus78/SiteData.xml' INTO TABLE plus78apartment ROWS IDENTIFIED BY '<Apartment>';";
        $stmt = $manager->getConnection()->prepare($sql);
        $stmt->execute();
    }
}