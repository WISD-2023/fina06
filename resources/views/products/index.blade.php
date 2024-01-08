<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>商品列表</title>
        <!-- 可以加入 CSS 檔案連結 -->
    </head>
    <body>

    <div class="container">
        <h1>商品列表</h1>
        <table>
            <thead>
            <tr>
                <th>商品名稱</th>
                <th>價格</th>
                <th>描述</th>
                <!-- 根據需要添加更多欄位 -->
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <!-- 根據需要顯示更多資訊 -->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    </body>
    </html>
</x-app-layout>
