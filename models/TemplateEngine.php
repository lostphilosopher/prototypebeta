<?php 
/* 
 * Basic templating capabilities for prototyping
 * Based on: http://www.smashingmagazine.com/2011/10/17/getting-started-with-php-templating/
 */
class TemplateEngine {
    
    protected $viewsDir       = 'views/';
    protected $layoutDir      = 'views/layouts/';
    protected $vars           = array();

    // Contstructor
    public function __construct($viewsDir = null, $layoutDir = null) {
        if ($viewsDir !== null && $layoutDir !== null) {
            // Check here whether these directories really exist
            $this->viewsDir    = $viewsDir;
            $this->layoutDir   = $layoutDir;
        }
    }

    // Render the file
    public function render($file) {
        if (file_exists($this->viewsDir.$file)) {
            include $this->layoutDir.'header.php';
            include $this->viewsDir.$file;
            include $this->layoutDir.'footer.php';
        } else {
            throw new Exception('no file ' . $file . ' present in directory ' . $this->viewsDir);
        }
    }

    // Setter
    public function __set($name, $value) {
        $this->vars[$name] = $value;
    }

    // Getter
    public function __get($name) {
        return $this->vars[$name];
    }
}
