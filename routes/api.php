<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// HTTP 요청을 보내는 api 엔드포인트 설정하는 파일
// 아래의 코드는 get요청을 받으면 인증을 거치고 로그인을 하지않으면 401 이 된다
// 인증이 되면 유저정보를 담아 json으로 응답함
Route::middleware(['auth:sanctum'])
    // 'auth:sanctum' 미들웨어는 이 그룹 내의 모든 라우트에 적용됩니다.
    // 이 미들웨어는 요청이 Sanctum을 통해 인증되었는지 확인합니다.
    // 인증되지 않은 요청은 401 Unauthorized 응답을 받게 됩니다.
    ->group(
        function () {
            // GET /api/user 경로로 오는 요청을 처리합니다.
            // 이 라우트는 'auth:sanctum' 미들웨어에 의해 보호되므로,
            // 인증된 사용자만 접근할 수 있습니다.
            Route::get('/user', function (Request $request) {
                return $request->user();
            });
        }
    );
