<?php
header('Content-Type: text/html; charset=utf-8');

// Let's make sure we're recieving an Ajax request.
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === "XMLHTTPREQUEST" && strtoupper($_SERVER['REQUEST_METHOD']) === "GET") {
    require_once './constants.php';
    require_once './helper.php';

    $response = array(
        'data'   => array(),
        'results' => 0,
        'message' => "",
        'term'    => ""
    );

    // Retrieves the searched term from the POST request sent by Ajax.
    $searchedTerm = $_GET['term'];
    // Let's make sure the string is trimmed.
    $searchedTerm = trim($searchedTerm);
    // We MUST ALWAYS sanitize user's inputs against XSS attacks before making queries in DB and etc with it.
    //$searchedTerm = xss_clean($searchedTerm);

    $db = getDatabase();

    $query = $db->prepare(
        'SELECT `state`.`title`, `state`.`alias`
        FROM `country_states` AS `state`
            LEFT JOIN `countries` AS `country` ON `country`.`id` = `state`.`country_id`
        WHERE `country`.`alias` = ?
          AND `state`.`title` LIKE ?
        ORDER BY `state`.`title` ASC'
    );

    $query->execute(array(
        "brazil",
        "%{$searchedTerm}%"
    ));

    $rowset = $query->fetchAll();
    $rowsetCount = count($rowset);

    $response['term'] = $searchedTerm;
    $response['data'] = $rowset;
    $response['results'] = $rowsetCount;
    $response['message'] = $rowsetCount > 0 ? "Results: {$rowsetCount}" : "No results was found";

    // Set up the response header to tell the browser we'll return a JSON instead of html/plain text etc.
    header('Content-Type: application/json');
    // Encodes our $response into JSON format.
    echo json_encode($response);

    // There's no more to do here with this request. We should stop any further execution after our response has been sent.
    die();
}

// This will show up when someone tries to access this file directly through the browser or any other way than an Ajax request.
echo 'Not a json request.';
