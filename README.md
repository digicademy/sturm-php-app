# DER STURM - Example PHP web application

This repository contains an example PHP web application of the project 
<a href="https://sturm-edition.de">'DER STURM. A Digital Edition of Sources from the 
International Avantgarde'</a>. It complements the <a href="https://github.com/digicademy/sturm-exist-app">
main application</a> which is based on XQuery, XSLT and the eXist XML database.

The main idea of this application is to have two applications that follow two different
programming paradigms (one functional with XQuery and one object oriented with PHP) but 
do exactly the same - generating a web based digital scholarly edition.

The PHP application is used for teaching purposes in the joint DH master programme 
<a href="https://www.digitale-methodik.uni-mainz.de/">'Digital Methods in the Humanities 
and Cultural Sciences'</a> of the Johannes Gutenberg University and the University of
Applied Sciences Mainz.

The following diagramm gives an overview over the software architecture:

![Diagramm of the PHP application](https://sturm-edition.de/images/sturm-php-app.png "Diagramm of the STURM PHP application")

Further details can be read in the <a href="https://sturm-edition.de/ressourcen/software.html">software documentation</a>.

### Download & Installation

All releases of the software can be downloaded from the 
<a href="https://github.com/digicademy/sturm-php-app/releases">release page</a>.

You can run this application in any modern PHP 7 environment. Just download the
application, go to the root directory and install it with a simple

```php
composer install
```

Then point your web browser to the index.php file in the _public_ folder of the application.

### License

The software is published under the terms of the MIT license. 

### Research Software Engineering and Development

Copyright 2018 <a href="https://orcid.org/0000-0002-0953-2818">Torsten Schrade</a>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
