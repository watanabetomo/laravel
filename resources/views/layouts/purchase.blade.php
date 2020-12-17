<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>洋菓子店カサミンゴー | バースデーケーキ | 誕生日ケーキ | 宅配 | 通販 | お取り寄せ</title>
    <script src="https://kit.fontawesome.com/98508d537e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/purchase.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><img class="logo" src="img/rogo_11.gif" alt="rogo_11.gif"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item icon">
                        <a href="cart.php"><i class="fas fa-shopping-cart fa-2x"></i><p>cart</p></a>
                    </li>
                    <li class="nav-item icon">
                        <a href="logout.php"><i class="fas fa-sign-out-alt fa-2x"></i><p>logout</p></a>
                    </li>
                </ul>
            </div>
        </nav>
        <p class="greeting">ようこそ{{session()->get('name')}}さん</p>
    </header>
    @yield('content')
    <footer>
        <p class="footer">Copyright Casa Mingo All Rights Reserved.　Kitaowaribe397-1 Nagano-shi Nagano 3810014 JAPAN</p>
    </footer>
</body>
</html>
