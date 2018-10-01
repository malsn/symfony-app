<?php
$file = '/var/www/symfony-app/bin/plus78/SiteData.xml';
$sql  = '/var/www/symfony-app/bin/plus78/SiteData.sql';
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
fwrite($s, xml2DB($xml));
fclose($s);
$xml->close();

function xml2DB($xml)
    {
        $sql_block_arr = [];
        $sql_building_arr = [];
        $sql_apartment_arr = [];
        while ($xml->read()) {
            if ($xml->name == 'Block') {
                $doc = new \DOMDocument();
                $block_node = simplexml_import_dom($doc->importNode($xml->expand(), true));
                $block_node_attributes = $block_node->attributes();
                $sql_block_arr[] = "({$block_node_attributes['id']}, '{$block_node_attributes['title']}')";
            } elseif ($xml->name == 'Building') {
                $doc = new \DOMDocument();
                $building_node = simplexml_import_dom($doc->importNode($xml->expand(), true));
                $building_node_attributes = $building_node->attributes();
                $sql_building_arr[] = "({$building_node_attributes['id']}, {$building_node_attributes['blockid']}, '{$building_node_attributes['corp']}')";
            } elseif ($xml->name == 'Apartment') {
                $doc = new \DOMDocument();
                $apartment_node = simplexml_import_dom($doc->importNode($xml->expand(), true));
                $apartment_node_attributes = $apartment_node->attributes();
                $sql_apartment_arr[] = "({$apartment_node_attributes['id']}, {$apartment_node_attributes['blockid']}, {$apartment_node_attributes['buildingid']}, {$apartment_node_attributes['rooms']}, {$apartment_node_attributes['flattypeid']}, {$apartment_node_attributes['baseflatcost']})";
            }
        }
        $sql = sprintf("INSERT INTO plus78block (xml_id,name) VALUES %s ON DUPLICATE KEY UPDATE updated_at='%s';\n", implode(",", $sql_block_arr), date("Y-m-d h:s:i"));
        $sql .= sprintf("INSERT INTO plus78building (xml_id,block_id,name) VALUES %s ON DUPLICATE KEY UPDATE updated_at='%s';\n", implode(",", $sql_building_arr), date("Y-m-d h:s:i"));
        $sql .= sprintf("INSERT INTO plus78apartment (xml_id,block_id,building_id,rooms,flattypeid,baseflatcost) VALUES %s ON DUPLICATE KEY UPDATE updated_at='%s';\n", implode(",", $sql_apartment_arr), date("Y-m-d h:s:i"));
        return $sql;
    }

?>