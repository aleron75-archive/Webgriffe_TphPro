Webgriffe_TphPro
================
An enhanced Template Path Hints extension for Magento that inserts references to used Magento Blocks inside HTML code, avoiding the usage of the more invasive built in Template Path Hints.

Facts
-----
- version 1.1.3
- extension key: Webgriffe_TphPro
- [extension on GitHub](https://github.com/aleron75/Webgriffe_TphPro)

Release Notes
-------------
- 1.1.3 - Improvements
    * added user info when logging Request Parameters; this way you can use this extension to log frontend and backend user actions; not very handy but useful;
- 1.1.2 - Improvements
    * ability to force printing of hints and handles passing proper query parameters.
- 1.1.1 - Fixes

Description
-----------
This extension allows you to print some useful information about Frontend Blocks in the HTML of your page.

You can choose whether to print them as HTML Elements or Comments.

Furthermore you can choose to log both Frontend and Backend HTTP Request's parameters.

Once installed, you can configure this extension in the `System > Configuration > WEBGRIFFE EXTENSIONS > Template Path Hints Pro` section shown below:

![System Configuration](https://raw.github.com/aleron75/Webgriffe_TphPro/master/doc/Webgriffe-TphPro-SystemConfig.png)

Otherwise you can force printing of hints and handles specifying one or more of the following parameters in the query string:

* ```handles=html_element``` or ```handles=html_comment```
* ```hints=html_element``` or ```hints=html_comment```

Compatibility
-------------
- Magento >= 1.7
- Not tested with previous versions; if you do and it works, please let us know in order to update the compatibility declaration. Thank you in advance.

Installation
------------
This extension can be installed through Modman.

For further information about Modman see https://github.com/colinmollenhour/modman/wiki/Tutorial

Uninstallation
--------------
This extension doesn't alter your DB schema, neither changes core files or configurations.

To remove that you can simply remove the following files and folders

- app/code/community/Webgriffe/TphPro folder
- app/etc/modules/Webgriffe_TphPro.xml file
- var/log/Webgriffe_TphPro.log file (if any)

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to [open a pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Alessandro Ronchi

- [http://www.alessandroronchi.com](http://www.alessandroronchi.com)
- [@aleron75](https://twitter.com/aleron75)
- [https://github.com/aleron75](https://github.com/aleron75)
- [+AlessandroRonchi](https://plus.google.com/+AlessandroRonchi)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2013 Webgriffe

