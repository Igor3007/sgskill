<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/view/parts/head.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/view/parts/header-login.php');
?>

<main>
      <section class="section-page-moderator">
        <div class="container">
          <div class="page-moderator">
            <div class="page-moderator__aside">
              <?php require_once($_SERVER['DOCUMENT_ROOT'].'/view/parts/user-aside.php');?>
            </div>
            <div class="page-moderator__content">
              <div class="head-moderator">
                <div class="head-moderator__breadcrumb">
                  <ul>

                    <?foreach( $PAGE['BREADCRUMBS'] as $key=>$value ):?>
                      <li><a href="<?=$key?>"><?=$value?></a></li>
                    <? endforeach; ?>
                     
                  </ul>
                </div>
                <div class="head-moderator__title">
                  <h1><?=$PAGE['h1']?></h1>
                </div>
                <div class="head-moderator__desc"><?=$PAGE['desc']?></div>
              </div>
              <div class="main-moderator">
                <?php require_once($_SERVER['DOCUMENT_ROOT'].'/view/'.$PAGE['TEMPLATE'].'.php');?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>



    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/view/parts/footer.php'); ?>