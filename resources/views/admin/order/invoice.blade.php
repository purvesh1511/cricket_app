<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>INVOICE</title>
    <link rel="stylesheet" href="invoice/style.css" media="all" />
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ public_path('invoice/logo.png') }}">
        </div>
        <h1>INVOICE</h1>
        <div id="company" class="clearfix">
            <div>{{ $site_name }}</div>
            <div>Shine Foods, 1/8, Plot No. 1401,<br /> GIDC, V.U. Nagar, Anand,<br /> Gujarat - 388121</div>
            <div>+91 79847 98740</div>
            <div><a href="mailto:Info@Shinefoods.In">Info@Shinefoods.In</a></div>
        </div>
        <div id="project">
            <div><span>NAME</span> {{ $orders->first()->fname }} {{ $orders->first()->lname }}</div>
            <div><span>ADDRESS</span> {{ $orders->first()->address_line_1 }}</div>
            <div><span>PHONE</span> {{ $orders->first()->phone }}</div>
            <div><span>EMAIL</span> <a href="mailto:{{ $orders->first()->email }}">{{ $orders->first()->email }}</a>
            </div>
            <div><span>DATE</span> {{ \Carbon\Carbon::now()->format('jS F, Y') }}</div>
            <div><span>ORDERED</span> {{ \Carbon\Carbon::parse($orders->first()->created_at)->format('jS F, Y') }}</div>
            <div><span>STATE</span> {{ $orders->first()->state }}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th style="width:10%;">IMAGE</th>
                    <th class="desc" style="width: 40%;">PRODUCT</th>
                    <th>PRICE</th>
                    <th>DISCOUNT PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                    $grand_total = 0;
                    $shipping_charge = 0;
                    $coupon_discount = 0;
                @endphp
                @foreach ($orders as $order)
                    @php
                        $total = (int) $order->quantity * (float) $order->discount_price;
                        $grand_total += $total;
                        $shipping_charge = $order->shipping_charge;
                        $stock = \App\Models\Stock::where([
                            'product_id' => $order->product->id,
                            'variation' => $order->variations,
                        ])->first();
                        if ($stock) {
                            $image = \App\Models\Gallery::where('stock_id', $stock->id)->first()->image;
                        } else {
                            $image = '';
                        }
                    @endphp
                    <tr>
                        <td class="mx-auto text-center">
                            <img src="{{ $image }}" style="width: 50px; object-fit:cover;">
                        </td>
                        <td class="desc">
                            {{ $order->product->title }}
                            {{ $order->variations != null ? '(' . $order->variations . ')' : '' }}
                        </td>
                        <td><span
                                style="font-family: DejaVu Sans; sans-serif;">&#8377;{{ number_format($order->price, 2) }}</span>
                        </td>
                        <td><span
                                style="font-family: DejaVu Sans; sans-serif;">&#8377;{{ number_format($order->discount_price, 2) }}</span>
                        </td>
                        <td>{{ $order->quantity }}</td>
                        <td><span
                                style="font-family: DejaVu Sans; sans-serif;">&#8377;{{ number_format($total, 2) }}</span>
                        </td>
                    </tr>
                @endforeach
                @php
                    if ($orders->first()->coupon_discount_amount > 0) {
                        if ($orders->first()->coupon_type == 'Percentage Discount') {
                            $coupon_discount = ($grand_total * $orders->first()->coupon_discount_amount) / 100;
                        } else {
                            $coupon_discount = (int) $orders->first()->coupon_discount_amount;
                        }
                    }
                @endphp

                <tr>
                    <td class="text-end fw-bolder" colspan="5">Sub Total</td>
                    <td class="fw-bolder">
                        <span
                            style="font-family: DejaVu Sans; sans-serif;">&#8377;{{ number_format($grand_total, 2) }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bolder" colspan="5">Shipping Charge</td>
                    <td class="fw-bolder">+
                        <span
                            style="font-family: DejaVu Sans; sans-serif;">&#8377;{{ number_format($shipping_charge, 2) }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="text-end fw-bolder" colspan="5">Coupon Discount</td>
                    <td class="fw-bolder">-
                        <span
                            style="font-family: DejaVu Sans; sans-serif;">&#8377;{{ number_format($coupon_discount, 2) }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="grand total" colspan="5">Grand Total</td>
                    <td class="grand total">
                        <span
                            style="font-family: DejaVu Sans; sans-serif;">&#8377;{{ number_format($grand_total + $shipping_charge - $coupon_discount, 2) }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
