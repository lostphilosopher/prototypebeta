<?php

require('models/Toro.php');
require('models/TemplateEngine.php');

class IndexHandler {
    function get() {
    	$templateEngine = new TemplateEngine();

    	$templateEngine->title = 'test';
    	$templateEngine->crew = array('Kirk', 'Spock', 'Bones', 'Chandler', 'Sulu', 'Uhura', 'Chekov');

    	return $templateEngine->render('test.php');

    }
}

Toro::serve(array(
    "/" => "IndexHandler",
));