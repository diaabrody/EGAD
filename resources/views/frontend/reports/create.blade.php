@extends('frontend.layouts.app')

@section('content')
    <h1>create report</h1>


<form method="post" enctype="multipart/form-data" action="/report/save" >
    {{ csrf_field() }}

    <div class="form-group">
<label for="name">اسم المفقود</label>
    <input type="text" name="name" class="form-control" placeholder="ادخل اسم المفقود">
</div>

<div class="form-group">
    <label for="gender">نوع</label>
    <select name="gender">
        <option value="0">ذكر</option>
        <option value="1">انثى</option>
    </select>

</div>

<div class="form-group">
    <label for="photo">صوره المفقود</label>
    <input type="file" name="photo" class="form-control" placeholder="ادخل الصوره" >
</div>

<div class="form-group">
    <label for="age">العمر</label>
    <input type="number" name="age" class="form-control" min="1" placeholder="ادخل العمر">
</div>

<div class="form-group">
    <label for="location">اين فقد</label>
    <input type="text" name="location" class="form-control" placeholder="ادخل المنطقه والمحافظه" id="autocomplete"  >
</div>


    @if ($status == "normal" || $status == "quick")
    <div class="form-group">
        <label for="lost_since">منذ متي فقد</label>
        <input type="date"  name="lost_since" class="form-control" placeholder="منذ متي فقد">
    </div>

    @endif


<div class="form-group">
    <label for="special_sign">علامات مميزه</label>
    <textarea  name="special_sign" class="form-control" placeholder="ادخل علامات مميزه"></textarea>
</div>


<div class="form-group">
    <label for="reporter_phone_number">رقم تليفون المبلغ</label>
    <input type="text" name="reporter_phone_number" class="form-control" placeholder="ادخل رقم تليفون المبلغ">
</div>

    <input type="hidden" value="{{$status}}" name="status">

<button type="submit" class="btn btn-success">انشر بلاغ</button>


</form>




    <script>
        // This example displays an address form, using the autocomplete feature
        // of the Google Places API to help users fill in the information.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOukh8jofbCBMBKRE6XhSKwTUtmgF7Wp0&libraries=places&callback=initAutocomplete"
            async defer></script>

@endsection