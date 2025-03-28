@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xl-3 col-xs-12 mt-3">

            <div class="card">
                <div class="card-header">
                    Generate Compass
                </div>
                <div class="card-body">

                    <form action="/compass" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select class="form-select" name="compass_type" id="compass_type"
                                onchange="calculateCompassPrice()">
                                <option value="traveler" selected>Traveler</option>
                                <option value="trader">Trader</option>
                                {{-- <option value="diplomat">Diplomat</option> --}}
                                <option value="explorer">Explorer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rarity</label>
                            <select class="form-select" name="compass_rarity" id="compass_rarity"
                                onchange="calculateCompassPrice()">
                                <option value="common" selected>Common</option>
                                <option value="uncommon">Uncommon</option>
                                <option value="rare">Rare</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price, GOLD</label>
                            <input type="number" class="form-control" id="compass_price" disabled>
                        </div>
                        <button type="submit" class="btn btn-primary">Build Compass</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-xl-3 col-xs-12 mt-3">

            <div class="card">
                <div class="card-header">
                    Generate Gem
                </div>
                <div class="card-body">

                    <form action="/gem" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Gem Type</label>
                            <select class="form-select" name="gem_type" id="gem_type" onchange="calculateGemPrice()">
                                <option value="intelligence" selected>Intelligence</option>
                                {{-- <option value="love">Love</option> --}}
                                <option value="experience">Experience</option>
                                <option value="luck">Luck</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rarity</label>
                            <select class="form-select" name="gem_rarity" id="gem_rarity"
                                onchange="calculateGemPrice()">
                                <option value="common" selected>Common</option>
                                <option value="uncommon">Uncommon</option>
                                <option value="rare">Rare</option>
                                <option value="legendary">legendary</option>
                                <option value="epic">epic</option>
                            </select>
                        </div>     
                        <div class="mb-3">
                            <label class="form-label">Price, GOLD</label>
                            <input type="number" class="form-control" id="gem_price" disabled>
                        </div>                                           
                        <button type="submit" class="btn btn-primary">Build Gem</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xs-12 mt-3">
        
        </div>
    </div>

    <div class="row py-5">

        <div class="col-xl-8 col-xs-12 mt-3">

            @if ($compas->count() > 0)
                <div class="card">
                    <div class="card-header">
                        Compass List
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Rarity</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compas as $compa)
                                        <tr>
                                            <td>{{ $compa->id }}</td>
                                            <td>{{ ucfirst($compa->compass_type) }}</td>
                                            <td>{{ ucfirst($compa->compass_rarity) }}</td>
                                            <td>{{ $compa->compass_level }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="/compass/{{ $compa->id }}">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary">
                                                            View
                                                        </button>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            @endif

        </div>

        <div class="col-xl-4 col-xs-12 mt-3">

            <div class="card">
                <div class="card-header">
                    Play Stats
                </div>
                <div class="card-body">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Log Out</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        function calculateCompassPrice() {
            var _type = document.getElementById("compass_type").value;
            var rarity = document.getElementById("compass_rarity").value;
            if (rarity == 'common' && _type == "broken") {
                document.getElementById("compass_price").value = 0.00;
            } else if (rarity == 'common') {
                document.getElementById("compass_price").value = 10000.00;
            } else if (rarity == 'uncommon') {
                document.getElementById("compass_price").value = 40000.00;
            } else {
                document.getElementById("compass_price").value = 160000.00;
            }
        }

        calculateCompassPrice();
    </script>
@endsection
