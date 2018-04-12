<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <div>
        <a href="https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id={{ config('services.line.client_id') }}&redirect_uri={{ config('services.line.redirect') }}&state=state&scope=openid%20profile">
            <button>Line Login</button>
        </a>
    </div>
    <div>
        <a href="https://auth.login.yahoo.co.jp/yconnect/v2/authorization?client_id={{ config('services.yahoo_japan.client_id') }}&redirect_uri={{ config('services.yahoo_japan.redirect') }}&response_type=code&scope=openid profile email">
            <button>Yahoo Japan Login</button>
        </a>
    </div>
    <div>
        <a href="https://nid.naver.com/oauth2.0/authorize?client_id={{ config('services.naver.client_id') }}&redirect_uri={{ config('services.naver.redirect') }}&response_type=code">
            <button>Naver Login</button>
        </a>
    </div>
    @if ($datas)
        <div>
            Result:
        </div>
        <div>
            {{ dd($datas) }}
        </div>
    @endif

</body>
</html>