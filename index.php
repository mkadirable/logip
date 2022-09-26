<?php
$users = $_SERVER["REMOTE_ADDR"];
function trackip($source)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $source);
    curl_setopt(
        $ch,
        CURLOPT_USERAGENT,
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13"
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $outPut = curl_exec($ch);
    curl_close($ch);
    return $outPut;
}
$url = trackip("https://geo.leadboxer.com/GeoIpEngine/" . $users);

preg_match_all("!(.*)!", $url, $match);
$aw = $match[1];

$date = str_replace("date: ", "", $aw[0]);
$ip = str_replace("ip: ", "", $aw[2]);
$countryCode = str_replace("countryCode: ", "", $aw[4]);
$continent = str_replace("continent: ", "", $aw[6]);
$subContinent = str_replace("subContinent: ", "", $aw[8]);
$surfaceArea = str_replace("surfaceArea: ", "", $aw[10]);
$population = str_replace("population: ", "", $aw[12]);
$lifeExpectency = str_replace("lifeExpectency: ", "", $aw[14]);
$gnp = str_replace("GNP: ", "", $aw[16]);
$countryName = str_replace("countryName: ", "", $aw[18]);
$region = str_replace("region: ", "", $aw[20]);
$regionName = str_replace("regionName: ", "", $aw[22]);
$city = str_replace("city: ", "", $aw[24]);
$latitude = str_replace("latitude: ", "", $aw[26]);
$longitude = str_replace("longitude: ", "", $aw[28]);
$worldCurrency = str_replace("world currency: ", "", $aw[30]);
$euMember = str_replace("EU member: ", "", $aw[32]);
$org = str_replace("org: ", "", $aw[34]);
$isp = str_replace("isp: ", "", $aw[36]);
$domain = str_replace("domain: ", "", $aw[38]);
$usageType = str_replace("usageType: ", "", $aw[40]);
$reverseDns = str_replace("reverse dns: ", "", $aw[42]);
$tldDns = str_replace("tld dns: ", "", $aw[44]);
$mmOrg = str_replace("mm_org: ", "", $aw[46]);
$mmIsp = str_replace("mm_isp: ", "", $aw[48]);
$i2lIsp = str_replace("i2l_isp: ", "", $aw[50]);
$i2lDomain = str_replace("i2l_domain: ", "", $aw[52]);
$i2lType = str_replace("i2l_type: ", "", $aw[54]);
$rpOrgAlt1 = str_replace("rp_orgAlt1: ", "", $aw[56]);
$responseTime = str_replace("response time [ms]: ", "", $aw[58]);

$data = [
    "date" => "$date",
    "ip" => "$ip",
    "countryCode" => "$countryCode",
    "continent" => "$continent",
    "subContinent" => "$subContinent",
    "surfaceArea" => "$surfaceArea",
    "population" => "$population",
    "lifeExpectency" => "$lifeExpectency",
    "GNP" => "$gnp",
    "CountryName" => "$countryName",
    "region" => "$region",
    "regionName" => "$regionName",
    "city" => "$city",
    "latitude" => "$latitude",
    "longitude" => "$longitude",
    "world_currency" => "$worldCurrency",
    "euMember" => "$euMember",
    "org" => "$org",
    "isp" => "$isp",
    "domain" => "$domain",
    "usageType" => "$usageType",
    "reverseDns" => "$reverseDns",
    "tldDns" => "$tldDns",
    "mmOrg" => "$mmOrg",
    "mmIsp" => "$mmIsp",
    "i2lIsp" => "$i2lIsp",
    "i2lType" => "$i2lType",
    "rpOrgAlt1" => "$rpOrgAlt1",
    "response" => "$responseTime",
];

($file = fopen("tmp.txt", "w")) or die("file not found");
fwrite($file, "----------------------------------------------" . PHP_EOL);
fwrite($file, "date :  $date" . PHP_EOL);
fwrite($file, "ip:  $ip" . PHP_EOL);
fwrite($file, "countryCode : $countryCode" . PHP_EOL);
fwrite($file, "continent : $continent" . PHP_EOL);
fwrite($file, "subContinent : $subContinent" . PHP_EOL);
fwrite($file, "surfaceArea : $surfaceArea" . PHP_EOL);
fwrite($file, "population : $population" . PHP_EOL);
fwrite($file, "lifeExpectency : $lifeExpectency" . PHP_EOL);
fwrite($file, "GNP : $gnp" . PHP_EOL);
fwrite($file, "CountryName : $countryName" . PHP_EOL);
fwrite($file, "region : $region" . PHP_EOL);
fwrite($file, "regionName : $regionName" . PHP_EOL);
fwrite($file, "city : $city" . PHP_EOL);
fwrite($file, "latitude : $latitude" . PHP_EOL);
fwrite($file, "longitude : $longitude" . PHP_EOL);
fwrite($file, "world_currency : $worldCurrency" . PHP_EOL);
fwrite($file, "euMember : $euMember" . PHP_EOL);
fwrite($file, "org : $org" . PHP_EOL);
fwrite($file, "isp : $isp" . PHP_EOL);
fwrite($file, "domain : $domain" . PHP_EOL);
fwrite($file, "usageType : $usageType" . PHP_EOL);
fwrite($file, "reverseDns : $reverseDns" . PHP_EOL);
fwrite($file, "tldDns : $tldDns" . PHP_EOL);
fwrite($file, "mmOrg : $mmOrg" . PHP_EOL);
fwrite($file, "mmIsp : $mmIsp" . PHP_EOL);
fwrite($file, "i2lIsp : $i2lIsp" . PHP_EOL);
fwrite($file, "i2lType : $i2lType" . PHP_EOL);
fwrite($file, "rpOrgAlt1 : $rpOrgAlt1" . PHP_EOL);
fwrite($file, "response : $responseTime" . PHP_EOL);
fwrite($file, "----------------------------------------------" . PHP_EOL);
echo json_encode($data);
