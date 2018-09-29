<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\SearchLog as SearchLog;
use Doctrine\Common\Persistence\ObjectManager;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    /**
     * @Route("/get_address", name="get_address")
     */
    public function getAddressAction(Request $request)
    {
        $query_str = $request->query->get('query');
        $query = new SearchLog();
        $query->setQuery($query_str);
        $query->setDate(new \DateTime());

        $ch = curl_init();
        /*$url = 'https://maps.googleapis.com/maps/api/place/queryautocomplete/json?input='.$query_str.
        '&key=AIzaSyC_vzjKMB7MDfDpZeyKbeOiqdUVsa4gUrQ';*/
        $url = "http://suggest-maps.yandex.ru/suggest-geo?callback=&part=".urlencode($query_str)."&lang=ru-RU&search_type=all&fullpath=0&v=5";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array('Content-type: application/json')); // Assuming you're requesting JSON
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        $response = new Response($response);

        $query->setResult($response);
        $em = $this->getDoctrine()->getManager();
        $em->persist($query);
        $em->flush();

        $response->headers->set("Access-Control-Allow-Origin", "*");

        return $response;
    }

    /**
     * @Route("/load_plus78", name="load_plus78")
     */
    public function loadPlus78Action()
    {
        $file = $_SERVER['DOCUMENT_ROOT'].'/plus78/SiteData.xml';
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
LOAD XML LOCAL INFILE '".$_SERVER['DOCUMENT_ROOT']."/plus78/SiteData.xml' INTO TABLE plus78apartment ROWS IDENTIFIED BY '<Apartment>';";
        $manager = $this->getDoctrine()->getManager();
        $stmt = $manager->getConnection()->prepare($sql);
        $stmt->execute();

        return new Response("Data loaded");
    }
}
