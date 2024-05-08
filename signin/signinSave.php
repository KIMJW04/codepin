<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youEmail = mysqli_real_escape_string($connect, $_POST['userEmail']);
    $youPass = mysqli_real_escape_string($connect, $_POST['userPass']);

    $sql = "SELECT memberID, youEmail, youName, youPass FROM members WHERE youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count == 0){
            // 사용자 아이디가 존재하지 않는 경우
            echo "<script>alert('아이디 또는 비밀번호가 없습니다. 회원가입을 해주세요!')</script>";
            echo "<script>history.back()</script>";
        } else {
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

            if(password_verify($youPass, $memberInfo['youPass'])){
                // 로그인 성공, 세션 설정
                $_SESSION['memberID'] = $memberInfo['memberID'];
                $_SESSION['youName'] = $memberInfo['youName'];

                
                echo "<script>alert('로그인 성공!!')</script>";
                echo "<script>window.location.href='../index.php'</script>";
            }else{
                // 로그인 실패
                echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다. 다시한번 확인해주세요.')</script>";
                echo "<script>history.back()</script>";
            }
        }
    }
?>