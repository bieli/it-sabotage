<?php

echo json_encode(
    array(
        'game' => array(
            'name' => 'Saboteur',
            'desc' => 'Saboteur it is clone of popular card game made in multiplayer.',
            'board' => array(
                'size' => array(
                    'x' => 7,
                    'y' => 5
                ),
                'locations' => array(
                    'start' => array(
                        'count' => 1,
                        'method' => 'none',
                        'prefix' => 'startcard'
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
                        'prefix' => 'finishcard'
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
                )
            ),
            'cards' => array(
                'count' => 24,
                'size' => array(
                    'x' => 100,
                    'y' => 150
                ),
                'locations' => array(
                    'start' => array(
                        'count' => 1,
                        'method' => false
                    ),
                    'finish' => array(
                        'x' => 7,
                        'y' => 5
                    ),
                )
            )

        )
    )
);

