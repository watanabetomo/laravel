@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{asset('/css/admin_product.css')}}">
<main>
    <p class="error">{{isset($error) ? $error : ''}}</p>
    <form action="/products/search" method="get">
        <p class="search"><input type="text" name="keyword"> <input type="submit" value="絞り込む"> <input type="submit" name="all" value="すべて表示"></p>
    </form>
    <table border="1" class="main-table">
        <tr>
            <th>
                <form action="/products/sort/id" method="get">
                    @csrf
                    <button type="submit" name="order" class="icon" value="asc">▲</button>
                    <p class="sorted">ID</p>
                    <button type="submit" name="order" class="icon" value="desc">▼</button>
                </form>
            </th>
            <th>
                <form action="/products/sort/name" method="get">
                    @csrf
                    <button type="submit" name="order" class="icon" value="asc">▲</button>
                    <p class="sorted">商品名</p>
                    <button type="submit" name="order" class="icon" value="desc">▼</button>
                </form>
            </th>
            <th>
                画像
            </th>
            <th>
                登録日時
            </th>
            <th>
                <form action="/products/sort/updated_at" method="get">
                    @csrf
                    <button type="submit" name="order" class="icon" value="asc">▲</button>
                    <p class="sorted">更新日時</p>
                    <button type="submit" name="order" class="icon" value="desc">▼</button>
                </form>
            </th>
            <th>
                <a href="/products/create" role="button" class="btn btn-sm">新規登録</a>
            </th>
        </tr>
        @if (!empty($products))
            @foreach ($products as $product)
                <tr>
                    <td>
                        {{$product['id']}}
                    </td>
                    <td>
                        {{$product['name']}}
                    </td>
                    <td>
                    </td>
                    <td>
                        {{(new DateTime($product['created_at']))->format('Y-m-d H:i:s')}}
                    </td>
                    <td>
                        {{!is_null($product['updated_at']) ? (new DateTime($product['updated_at']))->format('Y-m-d H:i:s') : ''}}
                    </td>
                    <td>
                        <p>
                            <a href="/products/{{$product['id']}}/edit" class="btn btn-sm" style="margin-top:20px;">編集</a>
                            <form action="/products/{{$product['id']}}" method="post" onsubmit="return confirm('本当に削除しますか？')">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-sm" name="delete" value="削除">
                            </form>
                        </p>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    @if (empty($product))
        <p class="message">商品情報がありません</p>
    @endif
</main>
@endsection
