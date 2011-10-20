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
 * @package     App_Resource
 * @author      Osman Ungur <osmanungur@gmail.com>
 * @copyright   2011 Osman Ungur
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @link        http://github.com/import/zend-twig
 */

/**
 * Resource for setting Twig view options
 *
 * @uses        Zend_Application_Resource_View 
 * @category    App
 * @package     App_Resource
 * @author      Osman Ungur <osmanungur@gmail.com>
 */
class App_Resource_Twig extends Zend_Application_Resource_View {

    public function getView() {
        if ($this->_view == null) {
            $view = new App_View_Twig(
                            APPLICATION_PATH . '/views/scripts',
                            $this->getOptions()
            );
            Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')->setView($view)->setViewSuffix('twig')->setViewBasePathSpec(':moduleDir/views/scripts');
            $this->_view = $view;
        }
        return $this->_view;
    }

}