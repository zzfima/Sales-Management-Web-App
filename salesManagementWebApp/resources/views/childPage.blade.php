<!DOCTYPE html>
<html lang="en">
<style>
    * {
        box-sizing: border-box;
    }

    .columnBig {
        float: left;
        width: 70%;
        padding: 10px;
    }

    .columnSmall {
        float: left;
        width: 30%;
        padding: 10px;
    }

    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }

    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }

    .row {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .input-field {
        margin-left: 1em;
        padding: .5em;
        margin-bottom: .5em;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales Management Web App</title>
</head>
<body class="antialiased">
<div>
    <div class="columnBig">
        <h2> Created sales </h2>
        <table class="styled-table">
            <thead>
            <tr>
                <th>Time</th>
                <th>Sale Number</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Payment Link</th>
            </tr>
            </thead>
            <tbody>
            @foreach($createdSales as $createdSale)
                <tr>
                    <td> {{$createdSale->time}} </td>
                    <td> {{$createdSale->sale_number}} </td>
                    <td> {{$createdSale->description}} </td>
                    <td> {{$createdSale->amount}} </td>
                    <td> {{$createdSale->currency}} </td>
                    <td> {{$createdSale->payment_link}} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="columnSmall">
        <h2> New Sale Creation</h2>
        <form method="post" action="{{ route('createNewSale') }}" accept-charset="UTF-8">
            {{ csrf_field() }} <!-- security purposes -->

            <div class="row">
                <label for="productName">Product Name:
                    <input type="text" name="productName" class="input-field" required placeholder="Enter product name">
                </label>
            </div>

            <div class="row">
                <label for="amount">Price:
                    <input type="text" name="amount" class="input-field" required placeholder="Enter price">
                </label>
            </div>

            <div class="row">
                <label for="currency">Currency:
                    <select name="currency">
                        @foreach($currencies as $curr)
                            <option value="{{$curr}}">{{$curr}}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <br>
            <button>Insert Payment Details</button>
        </form>
    </div>
</div>
</body>
</html>
