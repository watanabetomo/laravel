@extends('layouts.purchase')
@section('content')
<main>
    <div class="wrapper">
        <div class="box1">
            <div class="card">
                <div class="card-body">
                    <form action="purchase_edit.php" method="post">
                        @if (!empty($cart['cart']))
                            <p class="purchase"><input type="submit" name="purchase" value="レジに進む" class="btn btn-success"></p>
                        @endif
                        <p class="sub-title">合計金額（税込）</p>
                        <table class="table table-right">
                            <tr>
                                <th>小計</th>
                                <td>{{!empty($cart['cart']) ? number_format(h($cart['total_price'])) . '円' : ''}}</td>
                            </tr>
                            <tr>
                                <th>商品点数</th>
                                <td>{{!empty($cart['cart']) ? h($cart['total_count']) . '点' : ''}}</td>
                            </tr>
                            <tr>
                                <th>送料</th>
                                <td>{{!empty($cart['cart']) ? number_format(h($cart['shipping'])) . '円' : ''}}</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="box2">
            <p class="contents-title">カート</p>
            @if (!empty($cart['cart']))
                <table class="table-bordered table-center cart">
                    <tr>
                        <th>
                            削除
                        </th>
                        <th>
                            商品画像
                        </th>
                        <th>
                            商品名
                        </th>
                        <th>
                            個数
                        </th>
                        <th>
                            サイズ
                        </th>
                        <th>
                            単価
                        </th>
                        <th>
                            税抜価格
                        </th>
                    </tr>
                    @foreach ($cart['cart'] as $item)
                        <tr>
                            <td>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="id" value="{{$item['id']}}">
                                    <p style="margin: 10px;"><input type="submit" name="delete" value="削除"></p>
                                </form>
                            </td>
                            <td>
                                {{isset($product['img']) ? '<img src="asset('css/' . $product['img'])" alt="' . h($product['img']) . '">' : '画像なし'}}
                            </td>
                            <td>
                                {{h($product['name'])}}
                            </td>
                            <td>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="id" value="{{$item['id']}}">
                                    <input type="hidden" name="detail_id" value="{{$item['product_detail_id']}}">
                                    <input type="number" name="num" min="0" value="{{h($item['num'])}}" style="width: 70px; margin: 10px 10px;">
                                    <p><input type="submit" name="change" value="変更"></p>
                                </form>
                            </td>
                            <td>
                                {{h($productDetail['size'])}}cm
                            </td>
                            <td>
                                {{number_format(h($productDetail['price']))}}円
                            </td>
                            <td>
                                {{number_format(h($item['num']) * h($productDetail['price']))}}円
                            </td>
                        </tr>
                    @endforeach
                </table>
                <form action="" method="post">
                    <p class="submit-button"><a href="index.php" class="btn btn-primary">買い物を続ける</a> <input type="submit" class="btn btn-danger" name="clear" style="margin-left: 10px;" value="カートを空にする"></p>
                </form>
            @else
                <p class="empty-message">現在、カートの中身は空です。</p>
                <p class="submit-button"><a href="index.php" class="btn btn-primary">買い物を続ける</a></p>
            @endif
        </div>
    </div>
</main>
@endsection
