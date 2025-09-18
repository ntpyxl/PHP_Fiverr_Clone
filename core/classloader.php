<?php
require_once 'classes/Database.php';
require_once 'classes/Category.php';
require_once 'classes/Offer.php';
require_once 'classes/Proposal.php';
require_once 'classes/User.php';

$databaseObj = new Database();
$categoryObj = new Category();
$offerObj = new Offer();
$proposalObj = new Proposal();
$userObj = new User();

$userObj->startSession();
