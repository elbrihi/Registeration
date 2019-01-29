<?php

require('../app/classLoad.php');
session_start();
//create Controller
$entry = new EntryManager(PDOFactory::getMysqlConnection());
//get objects
$entries = $entry->getAll();



?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <?php   include('../include/head.php') ?>
    </head>
    <?php // die;?>
    <body>
    <body class="">
        <div class="col-md-12">
			<div class="panel panel-default">
                <?php foreach($entries as $entry){ ?>
				<div class="panel-heading">
                    <strong>
                        <div class="message">
                            <span class="arrow"></span>
                            <span class="datetime"><h3><?= date('d.m.Y', strtotime($entry->created())) ?> : <a href="entry-details.php?id=<?= $entry->id() ?>"><?= $entry->title() ?></a></h3></span>

                        </div>  
                    </strong>
                </div>
				<div class="panel-body" align="center">
                <div class="portlet">
                    <div class="portlet-title line">
                        </div>
                        <div class="portlet-body" id="chats">
                            <div class="scroller" data-height="343px" data-always-visible="1" data-rail-visible1="1">
                                <ul class="chats">
                                    <?php // foreach($entries as $entry){ ?>
                                    
                                        <div class="message">
                                            <span class="body">
                                            <?php  echo $entry->text(); ?>
                                            </span>
                                            <a class="name"><?= $entry->auther() ?></a>
                                        </div>
                                   
                                    <?php //} ?>    
                                </ul>
                            </div>
                        </div>
                    </div>
				</div>
                <?php  }?>
			</div>  
		</div>
        <?php  include('../include/footer.php'); ?>
        <?php // include('../include/scripts.php'); ?>     
    </body>
</html>