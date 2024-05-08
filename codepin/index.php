<?php
    include "connect/connect.php";
    include "connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">

<?php include "include/head.php"; ?>
<!-- //head -->

<body>
    <?php include "include/skip.php"; ?>
    <!-- //skip -->

    <?php include "include/header.php"; ?>
    <!-- //header -->

    <main id="main">
        <section class="section01">
            <h3>CODE PIN</h3>
            <div>
                <a href="#">click</a>
            </div>
        </section>
        <!-- //section01 -->
        <section class="section02">
            <h3>흩어져 있는 코드를 모아보세요</h3>
            <div class="scrollback">
                <div class="scrollbackL">
                    <h3>필요한 코드를 빠르게 찾아보세요.</h3>
                    <img src="assets/img/main-img04.jpg" alt="검은색 코드">
                </div>
                <div class="scrollbackR">
                    <h3>코드를 쉽게 접근하고 관리하세요.</h3>
                    <img src="assets/img/main-img03.jpg" alt="검은색 코드">
                </div>
            </div>
        </section>
        <!-- //section02 -->
        <section class="section03">
        </section>
        <!-- //section03 -->
        <section class="section04">
        </section>
        <!-- //section04 -->
    </main>

    <?php include "include/footer.php"; ?>
    <!-- //footer -->

    <div class="sign">
        <div class="sign__form">
            <div class="popup_close">X</div>
            <div class="sign__menu">
                <div class="sign__in__btn active">SIGN IN</div>
                <div class="sign__up__btn">SIGN UP</div>
            </div>
            <!-- //sign__menu -->
            <div class="sign__in">
                <form action="signin/signinSave.php" name="signinSave" method="post">
                    <fieldset>
                        <legend class="blind">로그인 영역</legend>
                        <div>
                            <label for="userEmail" class="blind">이메일</label>
                            <input type="text" name="userEmail" id="userEmail" placeholder="이메일" autocomplete="off"
                                class="input-style" required>
                        </div>
                        <div>
                            <label for="userPass" class="blind">패스워드</label>
                            <input type="password" name="userPass" id="userPass" placeholder="패스워드" autocomplete="off"
                                class="input-style" required>
                        </div>
                        <div class="center">
                            <button type="submit" class="btn-style">로그인</button>
                        </div>
                    </fieldset>
                </form>
                <div class="user__find line-top">
                    </ul>
                    <li><span>아이디가 기억이 나지 않는다면!</span> <a href="#" class="line-under">아이디 찾기</a></li>
                    <li><span>비밀번호가 기억이 나지 않는다면!</span> <a href="#" class="line-under">비밀번호 찾기</a></li>
                    </ul>
                </div>
                <!-- //user__find -->
            </div>
            <!-- //sign__in -->

            <div class="sign__up">
                <form action="signup/signup.php" name="signup" method="post" onsubmit ="return signupChecks()">
                    <div>
                        <label for="youEmail" class="required">이메일</label>
                        <div class="check">
                            <input type="email" name="youEmail" id="youEmail" placeholder="이메일을 적어주세요!"
                                autocomplete="off" class="input-style">
                            <div class="btn" onclick="EmailChecking()">중복확인</div>
                        </div>
                        <p class="msg" id="youEmailComment"></p>
                    </div>
                    <div>
                        <label for="youPass" class="required">비밀번호</label>
                        <input type="password" name="youPass" id="youPass" placeholder="비밀번호를 적어주세요!" autocomplete="off"
                            class="input-style">
                        <p class="msg" id="youPassComment"></p>
                    </div>
                    <div>
                        <label for="youPassC" class="required">비밀번호 확인</label>
                        <input type="password" name="youPassC" id="youPassC" placeholder="다시 한번 비밀번호를 적어주세요!"
                            autocomplete="off" class="input-style">
                        <p class="msg" id="youPassCComment"></p>
                    </div>
                    <div>
                        <label for="youName" class="required">닉네임</label>
                        <div class="check">
                            <input type="youName" name="youName" id="youName" placeholder="닉네임을 적어주세요!"
                                autocomplete="off" class="input-style">
                            <div class="btn" onclick="NameChecking()">중복확인</div>
                        </div>
                        <p class="msg" id="youNameComment"></p>
                    </div>
                    <div class="center">
                        <button href="sumbit" class="btn-style">회원가입</button>
                    </div>
                    </fieldset>
                </form>
                <div class="sign__policy line-top"><a href="#">이용약관</a> 및 <a href="#">개인정보처리방침</a>에 동의하고 시작합니다.</div>
            </div>
            <!-- //sign__up -->
        </div>
        <!-- sign__form -->
    </div>
    <!-- //login -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $(function () {
            // sign    
            $("#header .login").click(function () {
                $(".sign").show();
                $("body").css("overflow", "hidden");
            })
            $(".popup_close").click(function () {
                $(".sign").hide();
                $("body").css("overflow", "");
            })
            $(".sign__in__btn").click(function () {
                $(".sign__up").hide();
                $(".sign__in").show();
                $(".sign__in__btn").addClass("active");
                $(".sign__up__btn").removeClass("active");
            })
            $(".sign__up__btn").click(function () {
                $(".sign__in").hide();
                $(".sign__up").show();
                $(".sign__in__btn").removeClass("active");
                $(".sign__up__btn").addClass("active");
            })
        })
    </script>
    <!-- //로그인 회원가입 버튼 -->

    <script>
        let isNameCheck = false;
        let isEmailCheck = false;

        function NameChecking() {
            // 닉네임 검사
            let youName = $("#youName").val();

            if (youName == null || youName == '') {
                $("#youNameComment").text("➟ 닉네임을 입력해주세요!");
                return false;
            } else {
                // 닉네임 유효성 검사
                let getyouName = RegExp(/^(?=.*[a-zA-Z])[a-zA-Z0-9]{3,8}$/);

                if (!getyouName.test($("#youName").val())) {
                    $("#youNameComment").text("➟ 영어 3~8글자만 가능합니다.");
                    $("#youName").val('');
                    return false;
                }



                $.ajax({
                    type: "POST",
                    url: "../signup/signupCheck.php",
                    data: { "youName": youName, "type": "isNameCheck" },
                    dataType: "json",
                    success: function (data) {
                        if (data.result == "good") {
                            $("#youNameComment").text("➟ 사용 가능한 닉네임.");
                            isNameCheck = true;
                        } else {
                            $("#youNameComment").text("➟ 이미 존재하는 닉네임입니다.");
                            isNameCheck = false;
                        }
                    }
                })
            }
        }

        function EmailChecking() {
            // 이메일 검사
            let youEmail = $("#youEmail").val();
            if (youEmail == null || youEmail == '') {
                $("#youEmailComment").text("➟ 이메일를 입력해주세요!");
                return false;
            } else {
                let getYouEmail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([\-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i);

                if (!getYouEmail.test($("#youEmail").val())) {
                    $("#youEmailComment").text("➟ 올바른 이메일 주소를 입력해주세요");
                    $("#youEmail").val('');
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: "../signup/signupCheck.php",
                    data: { "youEmail": youEmail, "type": "isEmailCheck" },
                    dataType: "json",
                    success: function (data) {
                        if (data.result == "good") {
                            $("#youEmailComment").text("➟ 사용 가능한 이메일입니다.");
                            isEmailCheck = true;
                        } else {
                            $("#youEmailComment").text("➟ 이미 존재하는 이메일입니다.");
                            isEmailCheck = false;
                        }
                    }
                })
            }
        }

        function signupChecks() {
            // 메세지 초기화
            $(".msg").text("");

            // 비밀번호 검사
            let youPass = $("#youPass").val();
            if (youPass == null || youPass == '') {
                $("#youPassComment").text("➟ 비밀번호를 입력해주세요!");
                return false;
            } else {
                let getYouPass = $("#youPass").val();
                let getYouPassNum = getYouPass.search(/[0-9]/g);
                let getYouPassEng = getYouPass.search(/[a-z]/ig);
                let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

                if (getYouPass.length < 8 || getYouPass.length > 20) {
                    $("#youPassComment").text("➟ 8자리 ~ 20자리 이내로 입력해주세요");
                    return false;
                } else if (getYouPass.search(/\s/) != -1) {
                    $("#youPassComment").text("➟ 비밀번호는 공백없이 입력해주세요!");
                    return false;
                } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0) {
                    $("#youPassComment").text("➟ 영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                    return false;
                }
            }

            // 비밀번호확인 검사
            let youPassC = $("#youPassC").val();
            if (youPassC == null || youPassC == '') {
                $("#youPassCComment").text("➟ 비밀번호를 입력해주세요!");
                return false;
            }

            // 비밀번호 동일한지 체크
            if ($("#youPass").val() !== $("#youPassC").val()) {
                $("#youPassCComment").text("➟ 비밀번호가 일치하지 않습니다.");
                return false;
            }

            // 중복 확인이 이루어졌는지 검사
            if (!isNameCheck || !isEmailCheck) {
                alert("중복 확인을 먼저 진행해주세요!");
                return false;
            } else {
                alert("가입을 축합니다!");
            }
        }
    </script>
</body>

</html>