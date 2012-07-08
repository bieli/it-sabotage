<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1999 05:00:00 GMT');
//header('Content-Type: application/json');
header('Content-Type: text/plain');


if (isset($_GET['name'])
    && strtolower($_GET['name']) == 'saboteur'):

    echo json_encode(
        array(
            'gameScheme' => array(
                'name' => 'Saboteur',
                'desc' => 'Clone of popular card game made for multiplayer.',
                'board' => array(
                    'size' => array(
                        'x' => 9,
                        'y' => 5
                    ),
                ),
                'cards_params' => array(
                        'count' => 24,
                        'imagesize' => array(
                            'x' => 100,
                            'y' => 150
                        ),
                ),
                'cards' => array(
                     array(
                        'name' => 'start1',
                        'metrics' => array(
                            'W' => true,
                            'S' => true,
                            'N' => true,
                            'E' => true
                        ),
                        'opts' => array(
                            'start' => true,
                        ),
                    ),
                    array(
                        'name' => 'finish1',
                        'metrics' => array(
                            'W' => true,
                            'S' => true,
                            'N' => true,
                            'E' => true
                        ),
                        'opts' => array(
                            'finish' => true,
                            'destination' => true,
                            'hidden' => true
                        ),
                    ),
                    array(
                        'name' => 'finish2',
                        'metrics' => array(
                            'W' => true,
                            'S' => false,
                            'N' => false,
                            'E' => true
                        ),
                        'opts' => array(
                            'finish' => true,
                            'destination' => false,
                            'hidden' => true
                        ),
                    ),
                    array(
                        'name' => 'finish3',
                        'metrics' => array(
                            'W' => false,
                            'S' => false,
                            'N' => true,
                            'E' => true
                        ),
                        'opts' => array(
                            'finish' => true,
                            'destination' => false,
                            'hidden' => true
                        ),
                    ),
                    array(
                        'name' => 'card1',
                        'metrics' => array(
                            'W' => false,
                            'S' => false,
                            'N' => true,
                            'E' => true
                        ),
                        'opts' => array(
                        ),
                    ),
                    array(
                        'name' => 'card2',
                        'metrics' => array(
                            'W' => false,
                            'S' => true,
                            'N' => true,
                            'E' => true
                        ),
                        'opts' => array(
                        ),
                    ),
                    array(
                        'name' => 'card3',
                        'metrics' => array(
                            'W' => true,
                            'S' => true,
                            'N' => true,
                            'E' => true
                        ),
                        'opts' => array(
                        ),
                    ),


                ),
                'locations' => array(
                        'start' => array(
                            'count' => 1,
                            'method' => 'none',
                            'prefix' => 'startcard',
                            'collection' => array(
                                1 => array(
                                    'x' => 3,
                                    'y' => 1
                                ),
                            ),
                        ),
                        'finish' => array(
                            'count' => 3,
                            'method' => 'rand',
                            'prefix' => 'finishcard',
                            'collection' => array(
                                1 => array(
                                    'x' => 1,
                                    'y' => 7
                                ),
                                2 => array(
                                    'x' => 3,
                                    'y' => 7
                                ),
                                3 => array(
                                    'x' => 7,
                                    'y' => 7
                                ),
                            ),
                        ),
                    ),
                )
            )
    );

else:
    echo json_encode(
        array('error' => '[ERROR] No "name" param in GET or unknown game name !')
    );
endif;

exit;
