<!DOCTYPE html>
<html lang="en">
<style>
    * {
        box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
        width: 70%;
        padding: 10px;
        height: 300px; /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
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
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales Management Web App</title>
</head>
<body class="antialiased">
<div>
    <div class="column">
        <div class="table-responsive">
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
    </div>
</div>
</body>
</html>
