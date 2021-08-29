<?php
require_once('Delete.php');
$id = $_REQUEST['id'];
$delete = new Delete();
$delete->delete($id);