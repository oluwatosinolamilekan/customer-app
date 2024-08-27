<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Customers</h1>

        <form action="{{ route('customers.search') }}" method="GET">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-3">
                    <input type="text" name="order_number" class="form-control" placeholder="Order Number">
                </div>
                <div class="col-md-3">
                    <input type="text" name="item_name" class="form-control" placeholder="Item Name">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('customers.search') }}"  class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Orders / Items</th>
                </tr>
            </thead>
            <tbody>
                @if($customers->isEmpty())
                    <tr>
                        <td colspan="2">No results found</td>
                    </tr>
                @else
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <ul>
                                    @foreach($customer->orders as $order)
                                        <li>{{ $order->order_number }}
                                            <ul>
                                                @foreach($order->items as $item)
                                                    <li>{{ $item->name }}</li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>