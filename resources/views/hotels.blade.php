@extends('layout')
@section('title','Expedia Hotels Search')
@section('content')
<div class="container margin-top-50">
    <div class="row">
        @if (!empty($errors))
        <div class="alert alert-danger">
            <p>Filters not applied because of the below errors.</p>
            <ul>
                @foreach ($errors as $error)
                <li>{{ $error[0] }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-lg-4 col-md-6 col-md-offset-3 col-lg-offset-0">
            <div class="well">
                <h3 align="center">Hotel Search</h3>
                <form class="form-horizontal" method="get" action="/">
                    <div class="form-group col-md-12">
                        <label for="destinationCountry" class="control-label">Country</label>
                        <select name="destinationCountry" class="form-control" name="" id="destinationCountry">
                            <option value>Select One</option>
                            @foreach ($countriesCodes as $code => $countryName)
                            <option value="{{ $code }}" {{ (!empty($oldData[
                            'destinationCountry']) && $code == $oldData['destinationCountry'] ) ? 'selected' : '' }}>{{
                            $countryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="destinationCity" class="control-label">City</label>
                        <input type="string"
                               value="{{ !empty($oldData['destinationCity'])? $oldData['destinationCity']:'' }}"
                               name="destinationCity" type="text" class="form-control" id="destinationCity"
                               aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="lengthOfStay" class="control-label">Length of Stay</label>
                        <input value="{{ !empty($oldData['lengthOfStay'])? $oldData['lengthOfStay']:'' }}"
                               name="lengthOfStay" type="number" class="form-control" id="lengthOfStay"
                               aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-xs-5 nopadding">
                            <label for="minTripStartDate" class="minTripStartDate">Min Trip Start Date</label>
                            <input value="{{ !empty($oldData['minTripStartDate'])? $oldData['minTripStartDate']:'' }}"
                               name="minTripStartDate" type="text" id="minTripStartDate" class="form-control datepicker"
                               placeholder="Choose">
                        </div>

                        <div class="col-md-6 col-xs-5 nopadding">
                            <label for="maxTripStartDate" class="maxTripStartDate">Max Trip Start Date</label>
                            <input value="{{ !empty($oldData['maxTripStartDate'])? $oldData['maxTripStartDate']:'' }}"
                               name="maxTripStartDate" type="text" id="maxTripStartDate" class="form-control datepicker"
                               placeholder="Choose">
                       </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-xs-6">
                            <label for="minStarRating" class="control-label">Min Star Rating</label>
                            <input value="{{ !empty($oldData['minStarRating'])? $oldData['minStarRating']:'' }}"
                                   name="minStarRating" type="number" min="1" max="5" class="form-control"
                               id="minStarRating">
                       </div>
                       <div class="col-md-6 col-xs-6">
                            <label for="maxStarRating" class="control-label">Max Star Rating</label>
                            <input value="{{ !empty($oldData['maxStarRating'])? $oldData['maxStarRating']:'' }}"
                                   name="maxStarRating" type="number" min="1" max="5" class="form-control"
                                   id="maxStarRating">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-xs-6">
                            <label for="minTotalRate" class="control-label">Min Total Rate</label>
                            <input value="{{ !empty($oldData['minTotalRate'])? $oldData['minTotalRate']:'' }}"
                               name="minTotalRate" type="number" min="1" class="form-control"
                               id="minTotalRate">
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <label for="maxTotalRate" class="control-label">Max Total Rate</label>
                            <input value="{{ !empty($oldData['maxTotalRate'])? $oldData['maxTotalRate']:'' }}"
                               name="maxTotalRate" type="number" min="1" class="form-control"
                               id="maxTotalRate">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-xs-6">
                            <label for="minGuestRating" class="control-label">Min Guest Rating</label>
                            <input value="{{ !empty($oldData['minGuestRating'])? $oldData['minGuestRating']:'' }}"
                               name="minGuestRating" type="number" min="1" max="5" class="form-control"
                               id="minGuestRating">
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <label for="maxGuestRating" class="control-label">Max Guest Rating</label>
                            <input value="{{ !empty($oldData['maxGuestRating'])? $oldData['maxGuestRating']:'' }}"
                               name="maxGuestRating" type="number" min="1" max="5" class="form-control"
                               id="maxGuestRating">
                        </div>
                    </div>
                    <p class="text-center">
                        <button type="submit" class="btn btn-danger glyphicon glyphicon-search"></button>
                    </p>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 center-block float-none vid_container">
            @if (!empty($hotels['offers']['Hotel']))
            @foreach($hotels['offers']['Hotel'] as $key => $hotel)
            <div class="well search-hotel">
                <div class="row">
                    <a target="_blank" href="{{ rawurldecode($hotel['hotelUrls']['hotelSearchResultUrl']) }}">
                        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                            <img class="img-responsive" src="{{ $hotel['hotelInfo']['hotelImageUrl']}}" alt="Hotel Image">
                        </div>
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-7 title">
                            <div>
                                <h3 class="margin-top-0">{{ $hotel['hotelInfo']['hotelName']}} </h3>
                                <p>
                                    @for($i =0; $i < floor($hotel['hotelInfo']['hotelStarRating']); $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                </p>
                             </div>
                            <p>{{ $hotel['destination']['longName'] }}  </p>
                        </div>
                        <div class="col-md-3">
                            <p>
                                <strike class="gray-color px-2">{{ $hotel['hotelPricingInfo']['originalPricePerNight'] }}</strike>
                                <label class="px-2">{{ $hotel['hotelPricingInfo']['averagePriceValue'] }} ({{
                                    $hotel['hotelPricingInfo']['currency'] }})</label>
                            </p>
                            <label>
                                ({{ $hotel['hotelInfo']['hotelReviewTotal'] }} reviews)
                                {{ round($hotel['hotelInfo']['hotelGuestReviewRating'], 1) }}/5
                            </label>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <div class="well search-hotel">
                <div class="row">
                    <center>{{ "no hotel found" }}</center>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection