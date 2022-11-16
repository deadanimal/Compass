@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-3">
        <form action="/admin/token" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>             
            <button type="submit" class="btn btn-primary">Generate Token</button>
        </form>

    </div>      
</div>

<script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js"
        type="application/javascript"></script>

<script>
    console.log('lol');
    const provider = new ethers.providers.Web3Provider(window.ethereum)

    async function lol() {
        await provider.getBlockNumber();
    }    

    lol();

</script>  

@endsection

@section('scripts')
      
@endsection