<?php
/**
 * Copyright 2011 Osman Ungur
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); 
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at 
 *
 *          http://www.apache.org/licenses/LICENSE-2.0 
 *
 * Unless required by applicable law or agreed to in writing, software 
 * distributed under the License is distributed on an "AS IS" BASIS, 
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. 
 * See the License for the specific language governing permissions and 
 * limitations under the License. 
 *
 * @category    App
 * @package     App_View
 * @author      Osman Ungur <osmanungur@gmail.com>
 * @copyright   2011 Osman Ungur
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @link        http://github.com/import/zend-twig
 */

/**
 * Class for Zend_View compatible Twig implementation
 *
 * @uses        Zend_View_Interface 
 * @category    App
 * @package     App_View
 * @author      Osman Ungur <osmanungur@gmail.com>
 */
class App_View_Twig implements Zend_View_Interface {

    /**
     * Twig environment instance
     * 
     * @var Twig_Environment
     */
    protected $environment;

    /**
     * Twig loader instance
     * 
     * @var Twig_LoaderInterface
     */
    protected $loader;

    /**
     * Hash map of assigned variables
     * 
     * @var array
     */
    protected $variables = array();

    public function __construct($templatePath, $options) {
        $this->loader = new Twig_Loader_Filesystem($templatePath);
        $this->environment = new Twig_Environment($this->loader, $options);
    }

    public function getEngine() {
        return $this->environment;
    }

    public function setScriptPath($path) {
        $this->loader->setPaths($path);
    }

    public function getScriptPaths() {
        return $this->loader->getPaths();
    }

    public function setBasePath($path, $classPrefix = 'Zend_View') {
        $this->loader->setPaths($path);
    }

    public function addBasePath($path, $classPrefix = 'Zend_View') {
        $this->loader->addPath($path);
    }

    public function __set($key, $val) {
        $this->variables[$key] = $val;
    }

    public function __isset($key) {
        return isset($this->variables[$key]);
    }

    public function __unset($key) {
        unset($this->variables[$key]);
    }

    public function assign($spec, $value = null) {
        if (is_array($spec)) {
            $this->variables = array_merge($this->variables, $spec);
        } else {
            $this->variables[$spec] = $value;
        }
    }

    public function clearVars() {
        $this->variables = array();
    }

    public function render($name) {
        $template = $this->environment->loadTemplate($name);
        return $template->render($this->variables);
    }

}