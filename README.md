Zend Framework and Twig integration
-----------------------------------

This integration tested on Zend Framework 1.11.10, Twig 1.20 and PHP 5.3.8.

Installation
============

* Download Twig and place contents of <code>lib/Twig</code> folder to <code>/path/to/app/library/Twig</code>.
* Place <code>App</code> folder to <code>/path/to/app/library</code> folder.
* Update files of <code>/path/to/app/application/views/scripts</code> with <code>application/views/scripts</code> files. 

Add following lines to your <code>application.ini</code> file.
    
    [production]    
    autoloaderNamespaces[] = "App"
    autoloaderNamespaces[] = "Twig"
    pluginPaths.App_Resource_ = "App/Resource/"
    resources.twig.cache = "/path/to/cache/folder"
    
    [development : production]
    resources.twig.debug = true
    
**Note : This integration changes your view filenames extension to <code>twig</code> instead of <code>phtml</code>.**

