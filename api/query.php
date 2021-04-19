<?php
require_once '../vendor/autoload.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$client = Elasticsearch\ClientBuilder::create()->build();
//$searchstring = "";
$searchstring = strip_tags($_REQUEST['search']);
$correctionParams = [
    'index' => 'dissertation',
    'body'  => [
        'suggest' => [
            'mytermsuggester' => [
                'text' => $searchstring,
                'term' => [
                    'field' => 'title'
                ]
            ]
        ]
    ]
];

$checkresults = $client->search($correctionParams);
//echo json_encode($checkresults);
if(isset($checkresults['suggest']['mytermsuggester'][0]['options'][0])){
    $suggestText = $checkresults['suggest']['mytermsuggester'][0]['options'][0]['text'];
    if($suggestText != $searchstring){
        $searchstring = $suggestText;
    }
}

$params = [
'index' => 'dissertation',
'body'  => [
    'query' => [
        'query_string' => ["query" => $searchstring]
    ],
    'size' => 10000
]
];

$results = $client->search($params);
if($results['hits']['total']['value']>=1){
    http_response_code(200);
    echo json_encode($results['hits']['hits']);
}else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No results found.")
    );
}