<?php
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

function dbConnection()
{
  $dbhost = "localhost";
  $dbuser = "dbusername";
  $dbpass = "dbpassword";
  $dbname = "your_slims_database";
  $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}

#debug
$app->get('/phpinfo', function () {
  phpinfo();
});

$app->get('/', 'intro');
$app->get('/about', 'about');
$app->get('/check_id_number/:id_number', 'checkIdNumber');
#$app->get('/check_id_number', 'checkIdNumber');
$app->post('/kcounter01', 'addKcounter01');
$app->post('/kcounter02', 'addKcounter02');

/**
$app->get('/admin/masterfile', 'getMasterfileInfo');
$app->get('/admin/masterfile/author', 'getAuthorInfo');
$app->post('/admin/masterfile/author', 'createAuthor');
$app->get('/admin/masterfile/author/browse/:offset/:number', 'getAuthorList');
$app->get('/admin/masterfile/author/:author_id', 'getAuthorDetail');
$app->delete('/admin/masterfile/author/:author_id', 'deleteAuthorById');
$app->put('/admin/masterfile/author/:author_id', 'updateAuthorById');
**/

#$app->get('/wines/:id',  'getWine');
#$app->get('/wines/search/:query', 'findByName');
#$app->post('/wines', 'addWine');
#$app->put('/wines/:id', 'updateWine');
#$app->delete('/wines/:id',   'deleteWine');


function intro ()
{
  require_once 'custom/Controllers/intro.inc.php';
}

function about ()
{
  require_once 'custom/Controllers/about.inc.php';
}

# check id_number
function checkIdNumber ($id_number)
{
  require_once 'custom/Controllers/admin/membership/check_id_number.inc.php';
  #echo "check sound";
}

function addKcounter01 ()
{
  require_once 'custom/Controllers/admin/kcounter01/add_kcounter01.inc.php';
}

function addKcounter02 ()
{
  require_once 'custom/Controllers/admin/kcounter02/add_kcounter02.inc.php';
}


/**
function getAuthorInfo ()
{
  require_once 'custom/Controllers/admin/masterfile/author/info.inc.php';
}

function getAuthorList ($offset, $number)
{
  require_once 'custom/Controllers/admin/masterfile/author/author_list.inc.php';
}

function getAuthorDetail ($author_id)
{
  require_once 'custom/Controllers/admin/masterfile/author/author_detail.inc.php';
}

function createAuthor ()
{
  require_once 'custom/Controllers/admin/masterfile/author/create_author.inc.php';
}

function deleteAuthorById ($author_id)
{
  require_once 'custom/Controllers/admin/masterfile/author/delete_author_by_id.inc.php';
}

function updateAuthorById ($author_id)
{
  require_once 'custom/Controllers/admin/masterfile/author/update_author_by_id.inc.php';
}
**/

$app->run();
