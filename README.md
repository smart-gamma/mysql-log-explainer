# Smart Gamma  Doctrine log file analyzer
Allows scanning a log file and pick problematic queries from explain loop execution output

## Install

`
composer require --dev smart-gamma/mysql-log-explainer
` 

or use it as stand alone tool

`
git clone git@github.com:smart-gamma/mysql-log-explainer.git
composer install
`

## Configure

Copy .env.dist / .env

Change database settings and path to log file (Doctrine)

@todo: Add mysql native log support

## Run

`
./explainer ex:do:an
` 

[explaine]: https://smart-gamma.com/files/screenshot_684.png