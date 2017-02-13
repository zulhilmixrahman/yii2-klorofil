<?php
use yii\helpers\Url;

?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-menu">
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-bars icon-nav"></i>
            </button>
        </div>
        <div id="navbar-menu" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span>
                            <?= (isset(Yii::$app->user->name)) ? Yii::$app->user->name : 'User' ?>
                        </span>&nbsp;&nbsp;
                        <i class="icon-submenu lnr lnr-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= Url::to(['/user/profile']) ?>">
                                <i class="fa fa-user"></i> <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/user/account']) ?>">
                                <i class="fa fa-key"></i> <span>Change Password</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/user/logout']) ?>" data-method="POST">
                                <i class="fa fa-sign-out"></i> <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>