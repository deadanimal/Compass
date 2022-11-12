@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5>Gold</h5>
                            <p>{{$gold_balance->amount}}</p>
                        </div>
                        <div class="col">
                            <h5>Wisdom</h5>
                            <p>{{$wisdom_balance->amount}}</p>       
                        </div>
                    </div>
             

                </div>
            </div>            

            <div class="card mt-3">
                <div class="card-header">
                    Purchase Token
                </div>
                <div class="card-body">

                    <form action="/token" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Token</label>
                            <select class="form-select" name="token" id="token_name" onchange="calculateTokenPrice()">
                                <option value="gold" selected>Gold</option>
                                <option value="wisdom">Wisdom</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" class="form-control" name="amount" id="token_amount" min="1000" max="1000000000"
                                step="100" onchange="calculateTokenPrice()">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price, RM</label>
                            <input type="number" class="form-control" id="token_price" disabled>
                        </div>
                        <button type="submit" name="action" value="buy" class="btn btn-success">Buy Token</button>
                    </form>

                </div>
            </div>


        </div>
        <div class="col-9">

            <div class="row">
            </div>

            <div class="row">
                <div class="col">

                    <div class="card">
                        <div class="card-header">
                            Token Purchase
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Datetime</th>
                                            <th scope="col">Token</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchases as $purchase)
                                        <tr>
                                            <td>{{$purchase->created_at}}</td>
                                            <td>
                                                @if($purchase->token_id == 1)
                                                    Gold
                                                @else
                                                    Wisdom
                                                @endif
                                            </td>
                                            <td>{{$purchase->amount}}</td>
                                            <td>-</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>

    {{-- <div class="row mt-3">

        <div class="col-3">

            <div class="card">
                <div class="card-header">
                    Send Token
                </div>
                <div class="card-body">

                    <form action="/matic" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Token</label>
                            <select class="form-select" name="token" id="token">
                                <option value="gold" selected>Gold</option>
                                <option value="wisdom">Wisdom</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Receiver</label>
                            <input type="text" name="receiver" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" name="amount" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-dark">Send Token</button>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-9">
        </div>
    </div> --}}
@endsection


@section('scripts')
    <script>
        function calculateTokenPrice() {
            var token_name = document.getElementById("token_name").value;
            if (token_name == 'gold') {
                document.getElementById("token_price").value = document.getElementById("token_amount").value / 100;
            } else {
                document.getElementById("token_price").value = document.getElementById("token_amount").value;
            }
        }

        document.getElementById("token_amount").value = 1000;
        calculateTokenPrice();
    </script>
@endsection
