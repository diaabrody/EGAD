,{{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->id('editForm')->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
    <div class="row ">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.avatar'))->for('avatar') }}

                <div>
                    <input type="radio" name="avatar_type" value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} /> Gravatar
                    <input type="radio" name="avatar_type" value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} /> Upload

                    @foreach ($logged_in_user->providers as $provider)
                        @if (strlen($provider->avatar))
                            <input type="radio" name="avatar_type" value="{{ $provider->provider }}" {{ $logged_in_user->avatar_type == $provider->provider ? 'checked' : '' }} /> {{ ucfirst($provider->provider) }}
                        @endif
                    @endforeach
                </div>
            </div><!--form-group-->

            <div class="form-group hidden" id="avatar_location">
                {{ html()->file('avatar_location')->class('form-control') }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('الاسم الأول'))->for('first_name')->class('float-right') }}

                {{ html()->text('first_name')
                    ->class('form-control')
                    ->placeholder(__(''))
                    ->attribute('maxlength', 191)
                    ->required()
                    ->autofocus() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('اسم العائلة'))->for('last_name')->class('float-right') }}

                {{ html()->text('last_name')
                    ->class('form-control')
                    ->placeholder(__(''))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

     <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                {{ html()->email('email')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.email'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('Phone Number'))->for('phone_no') }}

                {{ html()->text('phone_no')
                ->class('form-control')
                ->placeholder(__('Phone Number'))
                ->required() }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('تاريخ الميلاد'))->for('date_of_birth')->class('float-right') }}

                {{ html()->date('date_of_birth')
                    ->class('form-control') }}
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                {{ html()->label(__('المدينة'))->for('city')->class('float-right') }}

                <select class="form-control" name="city" id="city" >
                    @foreach ($cities as $city)
                        <option value="{{ $city->name }}" {{ $logged_in_user->city == $city->name ? 'selected="selected"' : '' }}>{{ $city->name}}</option>
                    @endforeach
                </select>
            </div><!--form-group-->                  
        </div><!--col-->
    

    
        <div class="col-12 col-md-6">
            <div class="form-group">
                {{ html()->label(__('المنطقة'))->for('area')->class('float-right') }}
                
                <select name="area" id="region" class="form-control" >
                    @foreach ($regions as $region)
                        <option value="{{ $region->name }}" {{ $logged_in_user->region == $region->name ? 'selected="selected"' : '' }}>{{ $region->name}}</option>
                    @endforeach
                </select>
                                    

            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                {{ html()->label(__('timezone'))->for('timezone')->class('float-right') }}

                <select name="timezone" id="timezone" class="form-control" required="required">
                    @foreach (timezone_identifiers_list() as $timezone)
                        <option value="{{ $timezone }}" {{ $timezone == $logged_in_user->timezone ? 'selected' : '' }} {{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
                    @endforeach
                </select>
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group mb-0 clearfix">
<!--                {{ form_submit(__('labels.general.buttons.update')) }}-->
                <input type="submit" class="btn btn-warning btn-lg btn-block text-white font-weight-bold" value="احفظ التعديلات">
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
{{ html()->closeModelForm() }}

@push('after-scripts')
    <script>
        $(function() {
            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function() {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });
        });
    </script>
@endpush