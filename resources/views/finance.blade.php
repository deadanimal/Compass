@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-6">
            Token Balance:
            - Gold
            - Wise
            {{$user->balances}}
        </div>     

        <div class="col-3">
            <form action="/token" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Token</label>
                    <select class="form-select" name="token" id="token">
                        <option value="gold" selected>Gold</option>
                        <option value="wisdom">Wisdom</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" class="form-control" id="amount">
                </div>  
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" value="1.00" disabled>
                </div>                            
                <button type="submit" name="action" value="buy" class="btn btn-success">Buy Token</button>
                <button type="submit" name="action" value="sell" class="btn btn-danger">Sell Token</button>
            </form>

        </div>
        <div class="col-3">
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
                    <input type="number" name="amount" class="form-control" >
                </div>                           
                <button type="submit" class="btn btn-dark">Send Token</button>
            </form>
        </div>   
    </div>

    <div class="row py-5">
        <div class="col">

            <h3>Transaction</h3>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Type</th>
                            <th scope="col">Level</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
