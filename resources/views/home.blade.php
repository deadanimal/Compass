@extends('layouts.app')

@section('content')
    <div class="px-4 pt-5 my-5 text-center">
        <h1 class="display-4 fw-bold">Metaverse Compass</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Explore the real world and at the same time, the metaverse where you could get rewarded for the puzzles solved.
                You can choose to be an explorer, or a trader or a diplomat, as long as you buy the necessary compass to function. Each compass 
                has a different storyline! You go explore NOW!
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <a href="/play"><button type="button" class="btn btn-primary btn-lg px-4 me-sm-3">Explore Now</button></a>
                <a href="/faq"><button type="button" class="btn btn-outline-secondary btn-lg px-4">Learn More</button></a>
            </div>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="/images/compass-4891499_1920.jpg" class="img-fluid border rounded-3 shadow-lg mb-4"
                    alt="Example image" width="700" height="500" loading="lazy">
            </div>
        </div>
    </div>

    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Why play compass?</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#collection"></use>
                    </svg>
                </div>
                <h2>Fun of course!</h2>
                <p>You can play alone or you can play with your friends in multiplayer mode. No more just sitting at home, now you can play online game outdoors!</p>
                <a href="/play" class="icon-link">
                    Explore Now
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#chevron-right"></use>
                    </svg>
                </a>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#people-circle"></use>
                    </svg>
                </div>
                <h2>Love Thy Neighbour</h2>
                <p>Compass allows you to get to know more about about the places or businesses that are near you, IRL. Not just in the metaverse. Help them with some business okayh?</p>
                <a href="/random-location" class="icon-link">
                    Near You?
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#chevron-right"></use>
                    </svg>
                </a>
            </div>
            <div class="feature col">
                <div class="feature-icon bg-primary bg-gradient">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#toggles2"></use>
                    </svg>
                </div>
                <h2>Moolah!</h2>
                <p>With every action in the Metaverse Compass, you can make fake money and of course real money too! You do however have to touch some crypto. Dare?</p>
                <a href="/finance" class="icon-link">
                    Buy Token
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#chevron-right"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
