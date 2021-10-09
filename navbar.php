<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color:#FFDE17;">
    <?php  if (empty($userInput)){?>
    <a class="navbar-brand" href="<?php echo $BASE_URL; ?>">
        <img class="logo" src="images/logo-c1383effd4d17a6b3b566837fc7caeb895c979d9463ece5245c09ab0b7b89ddc.png">
        <img class="logo" src="images/BCSS_typo-811b50effac7681ad86c2ea85205bbd4c75bdbf6a7dc0476736d480b863e075d.png">
    </a>
    <?php }else { ?>
    <a class="navbar-brand" href="student/home">
        <img class="logo" src="images/logo-c1383effd4d17a6b3b566837fc7caeb895c979d9463ece5245c09ab0b7b89ddc.png">
        <img class="logo" src="images/BCSS_typo-811b50effac7681ad86c2ea85205bbd4c75bdbf6a7dc0476736d480b863e075d.png">
    </a>
    <?php } ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <?php  if (empty($userInput)){?>
                <a class="nav-link" href="<?php echo $BASE_URL; ?>"><b>Home</b><span class="sr-only">(current)</span></a>
                <?php }else { ?>
                <a class="nav-link" href="student/home"><b>Home</b><span class="sr-only">(current)</span></a>
                <?php } ?>
            </li>
            <li class="nav-item active">
                <?php  if (empty($userInput)){?>
                <a class="nav-link" href="<?php echo $BASE_URL; ?>"><b>Exam</b><span class="sr-only">(current)</span></a>
                <?php }else { ?>
                <a class="nav-link" href="exams"><b>Exam</b><span class="sr-only">(current)</span></a>
                <?php } ?>
            </li>
            <li class="nav-item active">
                <?php if(empty($userInput)){ ?>
                <a class="nav-link btn btn-success text-white btn-block" href="<?php echo $BASE_URL; ?>login"><b>Login</b><span
                        class="sr-only">(current)</span></a>
                <?php }else { ?>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <strong>My account</strong>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="student/students">Student Panel</a>
                    <a class="dropdown-item" href="student/teachers">Teacher Panel</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="student/edit_profile">Edit Profile</a>
                    <a class="dropdown-item" rel="nofollow" data-method="delete" href="logout.php">
                        <i class="fas fa-sign-out-alt"></i> <strong>Logout</strong>
                    </a>
                </div>
            </li>
            <?php  } ?>
            </li>
        </ul>
    </div>
</nav>