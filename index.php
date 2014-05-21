<?php

require('models/Toro.php');
require('models/TemplateEngine.php');
require('models/NoDb.php');

class IndexHandler {
    function get() {
    	$templateEngine = new TemplateEngine();

    	$templateEngine->title = 'test';
    	$templateEngine->crew = array('Kirk', 'Spock', 'Bones', 'Chandler', 'Sulu', 'Uhura', 'Chekov');

		// Test data
		$preJson = array(
			'method' => 'create',
			'data' => array(
				'table' => 'blog',
				array(
					'title' => 'Lorem ipsum: Part 1',
					'text' => 'See spot run. Look, see spot play 1.'
				),
				array(
					'title' => 'Lorem ipsum: Part 2',
					'text' => 'Look, see spot play 2.'
				),		
			)
		);
		$fileName = 'test.json';

    	$noDb = new NoDb();
    	$noDb->post($preJson, $fileName);


    	return $templateEngine->render('test.php');

    }
}

Toro::serve(array(
    "/" => "IndexHandler",
));