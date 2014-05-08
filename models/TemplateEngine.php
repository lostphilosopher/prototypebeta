<?php 
/* Basic templating capabilities for prototyping
 * Based on: http://www.smashingmagazine.com/2011/10/17/getting-started-with-php-templating/
 */
class TemplateEngine {
    
    protected $templateDir     = 'views/';
    protected $layoutDir       = 'views/layouts/';
    protected $vars            = array();

    public function __construct($templateDir = null) {
        if ($templateDir !== null) {
            // Check here whether this directory really exists
            $this->templateDir = $templateDir;
        }
    }

    // Render the template file
    public function render($file) {
        if (file_exists($this->templateDir.$file)) {
            include $this->layoutDir.'header.php';
            include $this->templateDir.$file;
            include $this->layoutDir.'footer.php';
        } else {
            throw new Exception('no template file ' . $file . ' present in directory ' . $this->templateDir);
        }
    }
    public function __set($name, $value) {
        $this->vars[$name] = $value;
    }
    public function __get($name) {
        return $this->vars[$name];
    }
}
