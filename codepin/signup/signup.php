<?php
    include "../connect/connect.php";

    $youEmail = mysqli_real_escape_string($connect, $_POST['youEmail']);
    $youPass = mysqli_real_escape_string($connect, $_POST['youPass']);
    $youName = mysqli_real_escape_string($connect, $_POST['youName']);
    $youRegTime = time();

    // 비밀번호 해싱
    $hashedPass = password_hash($youPass, PASSWORD_DEFAULT);

    // 쿼리
    $sql = "INSERT INTO members(youEmail, youPass, youName, youRegTime ,youDelete) VALUES('$youEmail', '$hashedPass', '$youName', '$youRegTime', '1')";
    $result = $connect -> query($sql);

    // 결과
    if(!$result){
        die ("쿼리 실행에 실패했습니다:" . $connect->error);
    };

    // 데이터베이스 연결 닫기
    mysqli_close($connect);

    echo "<script>window.location.href='../index.php';</script>";
?>
