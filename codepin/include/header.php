<header id="header" role="banner">
    <div class="container">
        <div class="header__inner">
            <div class="logo">
                <h1><a href="index.html"><img src="assets/img/logo.png" alt="index.html"></a></h1>
            </div>
            <fieldset class="inputbox">
                <legend class="blind">코드링크입력 영역</legend>
                <div>
                    <div class="header_codelink_input">
                        <input type="text" name="youCodelink" id="youCodelink" placeholder="로그인을 하여 코드 링크를 저장하세요!"
                            autocomplete="off" class="codelink-input-style">
                        <div class="btn">저장</div>
                    </div>
                </div>
            </fieldset>
            <?php if(isset($_SESSION['memberID'])){ ?>
                            <a href="../signin/signout.php"><img src="../assets/img/974e19416242ccb6755ce5e4878d4988.jpg"></a>
            <?php } else{ ?>
                    <div class="login btn">로그인</div>
            <?php } ?>
        </div>
    </div>
</header>
<!-- //header -->