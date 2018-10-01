<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Plus78Apartment;
use AppBundle\Entity\Plus78Block;
use AppBundle\Entity\Plus78Building;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\SearchLog as SearchLog;
use Symfony\Component\Validator\Constraints\DateTime;

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
        ini_set("max_execution_time", "6000");

        $file = $_SERVER['DOCUMENT_ROOT'].'/plus78/SiteData.xml';
        $sql = $_SERVER['DOCUMENT_ROOT'].'/plus78/SiteData.sql';
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


        $xml = new \XMLReader();
        $xml->open($file);
        $s = fopen($sql, 'w');
        fwrite($s, $this->xml2DB($xml));
        fclose($s);
        $xml->close();

        /* for MySQL 6+
        $sql = "use myproject;
LOAD XML LOCAL INFILE '".$_SERVER['DOCUMENT_ROOT']."/plus78/SiteData.xml' INTO TABLE plus78apartment ROWS IDENTIFIED BY '<Apartment>';";
        $manager = $this->getDoctrine()->getManager();
        $stmt = $manager->getConnection()->prepare($sql);
        $stmt->execute();
        */

        return new Response("Data uploaded");
    }

    protected function xml2DB($xml)
    {
        $em = $this->getDoctrine()->getManager();
        $sql_block_arr = [];
        $sql_building_arr = [];
        $sql_apartment_arr = [];
        while ($xml->read()) {
            if ($xml->name == 'Block') {
                $doc = new \DOMDocument();
                $block_node = simplexml_import_dom($doc->importNode($xml->expand(), true));
                $block_node_attributes = $block_node->attributes();
                $sql_block_arr[] = "({$block_node_attributes['id']}, '{$block_node_attributes['title']}')";
                /*$block = $em->getRepository(Plus78Block::class)->findOneBy(["xml" => $block_node_attributes['id']]);
                if (!$block){
                    $block = new Plus78Block();
                    $block->setXml($block_node_attributes['id']);
                    $block->setName($block_node_attributes['title']);
                    $block->setUpdatedAt(new \DateTime());
                    $em->persist($block);
                } else {
                    $block->setUpdatedAt(new \DateTime());
                }
                $em->flush();*/
            } elseif ($xml->name == 'Building') {
                $doc = new \DOMDocument();
                $building_node = simplexml_import_dom($doc->importNode($xml->expand(), true));
                $building_node_attributes = $building_node->attributes();
                $sql_building_arr[] = "({$building_node_attributes['id']}, {$building_node_attributes['blockid']}, '{$building_node_attributes['corp']}')";
                /*$building = $em->getRepository(Plus78Building::class)->findOneBy(["xml" => $building_node_attributes['id']]);
                if (!$building){
                    $building = new Plus78Building();
                    $building->setXml($building_node_attributes['id']);
                    $building->setBlock($building_node_attributes['blockid']);
                    $building->setName($building_node_attributes['corp']);
                    $building->setUpdatedAt(new \DateTime());
                    $em->persist($building);
                } else {
                    $building->setUpdatedAt(new \DateTime());
                }
                $em->flush();*/
            } elseif ($xml->name == 'Apartment') {
                $doc = new \DOMDocument();
                $apartment_node = simplexml_import_dom($doc->importNode($xml->expand(), true));
                $apartment_node_attributes = $apartment_node->attributes();
                $sql_apartment_arr[] = "({$apartment_node_attributes['id']}, {$apartment_node_attributes['blockid']}, {$apartment_node_attributes['buildingid']}, {$apartment_node_attributes['rooms']}, {$apartment_node_attributes['flattypeid']}, {$apartment_node_attributes['baseflatcost']})";
                /*$apartment = $em->getRepository(Plus78Apartment::class)->findOneBy(["xml"=> $apartment_node_attributes['id']]);
                if (!$apartment){
                    $apartment = new Plus78Apartment();
                    $apartment->setXml($apartment_node_attributes['id']);
                    $apartment->setBaseflatcost($apartment_node_attributes['baseflatcost']);
                    $apartment->setBlock($apartment_node_attributes['blockid']);
                    $apartment->setBuilding($apartment_node_attributes['buildingid']);
                    $apartment->setRooms($apartment_node_attributes['rooms']);
                    $apartment->setFlattypeid($apartment_node_attributes['flattypeid']);
                    $apartment->setUpdatedAt(new \DateTime());
                    $em->persist($apartment);
                } else {
                    $apartment->setUpdatedAt(new \DateTime());
                }
                $em->flush();*/
            }
        }
        $sql = sprintf("INSERT INTO plus78block (xml_id,name) VALUES %s ON DUPLICATE KEY UPDATE updated_at='%s';\n", implode(",", $sql_block_arr), date("Y-m-d h:s:i"));
        $sql .= sprintf("INSERT INTO plus78building (xml_id,block_id,name) VALUES %s ON DUPLICATE KEY UPDATE updated_at='%s';\n", implode(",", $sql_building_arr), date("Y-m-d h:s:i"));
        $sql .= sprintf("INSERT INTO plus78apartment (xml_id,block_id,building_id,rooms,flattypeid,baseflatcost) VALUES %s ON DUPLICATE KEY UPDATE updated_at='%s';\n", implode(",", $sql_apartment_arr), date("Y-m-d h:s:i"));
        return $sql;
    }
}
