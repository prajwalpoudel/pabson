@push('style')
    <style>
        .active {
            color: blue;
        }
    </style>
@endpush
<div class="col-lg-4 col-md-12 col-sm-12 order-2 order-lg-1 order-md-2">
    <div class="page_sidebar hide-23">
        <!-- Search Form -->
        {!! Form::model(request()->all(), ['route' => 'search', 'method' => 'get', 'class' => 'form-inline addons mb-3', 'id' => 'school_search_form']) !!}
        {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => 'Search School']) !!}
        @if(request()->input('province_id'))
            {!! Form::hidden('province_id', old('province_id', null)) !!}
        @endif
        @if(request()->input('district_id'))
            {!! Form::hidden('district_id', old('district_id', null)) !!}
        @endif
        @if(request()->input('municipality_id'))
            {!! Form::hidden('municipality_id', old('municipality_id', null)) !!}
        @endif
        <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
        {!! Form::close() !!}


{{--        <form action="{{ route('search') }}" class="form-inline addons mb-3">--}}
{{--            <input class="form-control" type="search" name="keyword" placeholder="Search School" aria-label="Search">--}}
{{--            <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>--}}
{{--        </form>--}}

        <h4 class="side_title">Location</h4>
        <div id="accordion" class="accordion custom_accordion">
            <div class="mb-0 ml-2">
                <a href="{{ route('search', request()->only('keyword')) }}">
                    <p style="font-weight: bold; font-size:16px" class="{{ getActiveAccordion(null, request()->input('province_id'), request()->input('district_id'), request()->input('municipality_id'), null) }}">All</p>
                </a>
                @foreach($provinces as $province)
                    <a class="collapsed" data-toggle="collapse" href="#collapseprovince{{ $province->id }}">
                        <p style="font-weight: bold; font-size:16px" class="{{ getActiveAccordion($province->id, request()->input('province_id'), request()->input('district_id'), request()->input('municipality_id'), 'province') }}">{{ $province->name }}</p>
                    </a>
                    <div id="collapseprovince{{ $province->id }}" class="collapse ml-2 {{ getActiveAccordion($province->id, request()->input('province_id'), request()->input('district_id'), request()->input('municipality_id'), 'province') }}" data-parent="#accordion" >
                        <div id="accordion1" class="accordion custom_accordion">
                            <a href="{{ route('search', array_merge(request()->only('keyword'), ['province_id' => encrypt($province->id)])) }}">
                                <p style="font-weight: bold; font-size:14px" class="{{ getActiveAccordion($province->id, request()->input('province_id'), request()->input('district_id'), request()->input('municipality_id'), 'province', true) }}">All</p>
                            </a>
                            @foreach($province->districts as $district)
                                    <a class="collapsed" data-toggle="collapse" href="#collapsedistrict{{ $district->id }}">
                                        <p style="font-weight: bold; font-size:14px" class="{{ getActiveAccordion($district->id, request()->input('province_id'), request()->input('district_id'), request()->input('municipality_id'), 'district') }}">{{ $district->name }}</p>
                                    </a>
                                    <div id="collapsedistrict{{ $district->id }}" class="collapse ml-2 {{ getActiveAccordion($district->id, request()->input('province_id'), request()->input('district_id'), request()->input('municipality_id'), 'district') }}" data-parent="#accordion1" >
                                        <a href="{{ route('search', array_merge(request()->only('keyword'), ['district_id' => encrypt($district->id)])) }}">
                                            <p style="font-weight: bold; font-size:12px" class="{{ getActiveAccordion($district->id, request()->input('province_id'), request()->input('district_id'), request()->input('municipality_id'), 'district', true) }}">All</p>
                                        </a>
                                    @foreach($district->municipalities as $municipality)
                                            <a href="{{ route('search', array_merge(request()->only('keyword'), ['municipality_id' => encrypt($municipality->id)])) }}">
                                                <p style="font-weight: bold; font-size:12px" class="{{ getActiveAccordion($municipality->id, request()->input('province_id'), request()->input('district_id'), request()->input('municipality_id'), 'municipality') }}">{{ $municipality->name }}</p>
                                            </a>
                                        @endforeach
                                    </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</div>
